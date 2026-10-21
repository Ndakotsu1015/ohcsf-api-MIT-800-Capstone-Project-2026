<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrivilegeDetailCollection;
use App\Http\Resources\PrivilegeDetailResource;
use App\Mail\PrivilegeAssigned;
use App\Models\PrivilegeDetail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PrivilegeDetailController extends Controller
{

    const LOG_KEY = "[PrivilegeDetailController]";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privilegeDetails = PrivilegeDetail::with('privilegeClass', 'user', 'privilege')->latest()->get();

        return new PrivilegeDetailCollection($privilegeDetails);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $privilegeDetail = PrivilegeDetail::create($request->validated());

        return new PrivilegeDetailResource($privilegeDetail->load('privilegeClass', 'user', 'privilege'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrivilegeDetail  $privilegeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PrivilegeDetail $privilegeDetail)
    {
        return new PrivilegeDetailResource($privilegeDetail->load('privilegeClass', 'user', 'privilege'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrivilegeDetail  $privilegeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrivilegeDetail $privilegeDetail)
    {
        $privilegeDetail->update($request->validated());

        return new PrivilegeDetailResource($privilegeDetail->load('privilegeClass', 'user', 'privilege'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivilegeDetail  $privilegeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivilegeDetail $privilegeDetail)
    {
        $privilegeDetail->delete();

        return response()->noContent();
    }

    public function add(Request $request)
    {
        try {
            $rules = [
                'privilege_id' => 'required|numeric|exists:App\Models\Privilege,id',
                'privilege_class_id' => 'required|numeric|exists:App\Models\PrivilegeClass,id',
                'user_list' => ['nullable', 'array'],
                'user_list.*' => ['exists:\App\Models\User,id']
            ];

            $data = $this->validate($request, $rules);

            DB::beginTransaction();

            if (isset($data['user_list'])) {
                $this->setIndividualPrivileges($data);
            }

            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        return jsend_success(null, 201);
    }

    public function setIndividualPrivileges($data)
    {
        $users = User::whereIn('id', $data['user_list'])->latest()->get();


        $this->setPrivileges($users, $data);
    }

    public function setPrivileges($users, $data)
    {

        foreach ($users as $key => $user) {
            if ($user->privileges()->where([
                'privilege_details.user_id' => $user->id,
                'privilege_details.privilege_id' => $data['privilege_id']
            ])
                ->exists()
            ) {
                $user->privileges()->where([
                    'privilege_details.user_id' => $user->id,
                    'privilege_details.privilege_id' => $data['privilege_id']
                ])
                    ->update(['privilege_class_id' => $data['privilege_class_id']]);
            } else {
                // bypassing privilege_header table
                // we use the statusID column in privilege_details table to store PrivilegeClassID foreign key
                // and we use PrivHeaderID column to store PrivilegeID foreign key
                // dd($data);
                $privilege = new PrivilegeDetail();
                $privilege->privilege_id = $data['privilege_id'];
                $privilege->privilege_class_id = $data['privilege_class_id'];
                $privilege->user_id = $user->id;

                $user->privileges->add($privilege);
                $user->push();
            }

            // send email

            $details = [
                'user' => $user,
                'subject' => 'Privilege Assigned',
                'content' => 'You have been assigned the role of ' . $privilege->privilege->name,
            ];

            try {
                $unsubscribeLink = config('settings.app.url') . '/unsubscribe';
                Mail::to($user)->queue(new PrivilegeAssigned($details, $unsubscribeLink));
            } catch (Exception $e) {
                Log::error($e->getMessage());
            }
        }
    }
}
