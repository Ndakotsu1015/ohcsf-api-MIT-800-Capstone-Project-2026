<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrivilegeClassStoreRequest;
use App\Http\Requests\PrivilegeClassUpdateRequest;
use App\Http\Resources\PrivilegeClassCollection;
use App\Http\Resources\PrivilegeClassResource;
use App\Models\PrivilegeClass;
use Illuminate\Http\Request;

class PrivilegeClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privilegeClasses = PrivilegeClass::latest()->get();

        return new PrivilegeClassCollection($privilegeClasses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrivilegeClassStoreRequest $request)
    {
        $privilegeClass = PrivilegeClass::create($request->validated());

        return new PrivilegeClassResource($privilegeClass);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrivilegeClass  $privilegeClass
     * @return \Illuminate\Http\Response
     */
    public function show(PrivilegeClass $privilegeClass)
    {
        return new PrivilegeClassResource($privilegeClass);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrivilegeClass  $privilegeClass
     * @return \Illuminate\Http\Response
     */
    public function update(PrivilegeClassUpdateRequest $request, PrivilegeClass $privilegeClass)
    {
        $privilegeClass->update($request->validated());

        return new PrivilegeClassResource($privilegeClass);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivilegeClass  $privilegeClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivilegeClass $privilegeClass)
    {
        $privilegeClass->delete();

        return response()->noContent();
    }
}
