<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuAuthorizationCollection;
use App\Http\Resources\MenuAuthorizationResource;
use App\Models\Menu;
use App\Models\MenuAuthorization;
use Exception;
use Illuminate\Http\Request;

class MenuAuthorizationController extends Controller
{

    const LOG_KEY = "[MenuAuthorizationController]";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuAuthorizations = MenuAuthorization::with('privilege', 'menu', 'menu.module')->latest()->get();

        return new MenuAuthorizationCollection($menuAuthorizations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menuAuthorization = MenuAuthorization::create($request->validated());

        return new MenuAuthorizationResource($menuAuthorization->load('privilege', 'menu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuAuthorization  $menuAuthorization
     * @return \App\Http\Resources\MenuAuthorizationResource
     */
    public function show(MenuAuthorization $menuAuthorization)
    {
        return new MenuAuthorizationResource($menuAuthorization->load('privilege', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuAuthorization  $menuAuthorization
     * @return \Illuminate\Http\Response
     */
    // public function update(MenuAuthorizationUpdateRequest $request, MenuAuthorization $menuAuthorization)
    // {
    //     $menuAuthorization->update($request->validated());

    //     return new MenuAuthorizationResource($menuAuthorization->load('privilege', 'menu'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuAuthorization  $menuAuthorization
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuAuthorization $menuAuthorization)
    {
        $menuAuthorization->delete();

        return response()->noContent();
    }

    public function add(Request $request)
    {

        // dd($request->all());

        $rules = [
            'access_level_option' => 'required|integer',
            'privilege_id' => 'nullable|integer|numeric|exists:App\Models\Privilege,id',
            // 'menu_id' => 'required_if:access_level_option,3|array',
            // 'menu_id.*' => 'integer|numeric|exists:App\Models\Menu,id',
            // 'privilege_to_copy' => 'required_if:access_level_option,2|integer'
        ];


        if ($request['access_level_option'] == 1) {
            // dd($request);

            $data = $this->validate($request, $rules);

            $data['menu_id'] = Menu::all()->pluck('id')->toArray();
        } else if ($request['access_level_option'] == 2) {

            $rules['privilege_to_copy'] = 'required_if:access_level_option,2|integer';
            $data = $this->validate($request, $rules);

            $data['menu_id'] = MenuAuthorization::where('privilege_id', $data['privilege_to_copy'])->get()->pluck('menu_id')->toArray();
        } else if ($request['access_level_option'] == 3) {

            // dd("option 3");
            try {

                $rules['menu_id'] = 'required_if:access_level_option,3|array';
                $rules['menu_id.*'] = 'integer|numeric|exists:App\Models\Menu,id';
                // dd("before");
                $data = $this->validate($request, $rules);
                // dd("after");
            } catch (Exception $e) {
                dd($e);
            }
        }

        $authorizationIds = $this->addMenuAuthorizations($data);

        return jsend_success(MenuAuthorizationResource::collection(MenuAuthorization::whereIn('id', $authorizationIds)->with(
            'menu',
            'privilege'
        )->get()), 201);
    }

    public function addMenuAuthorizations($payload)
    {
        $authIds = [];

        foreach ($payload['menu_id'] as $key => $menu) {
            $privilege = empty($payload['privilege_id']) ? null : $payload['privilege_id'];

            if (MenuAuthorization::where(['privilege_id' => $privilege, 'menu_id' => $menu])->exists()) continue;

            $menuAuthorization = new MenuAuthorization();
            $menuAuthorization->privilege_id = $privilege;
            $menuAuthorization->menu_id = $menu;
            $menuAuthorization->save();
            $authIds[] = $menuAuthorization->id;
        }

        return $authIds;
    }
}
