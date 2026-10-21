<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Http\Resources\MenuCollection;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::with('parentMenu', 'module')->latest()->get();

        return new MenuCollection($menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $menu = Menu::create($request->validated());

        return new MenuResource($menu->load('parentMenu', 'module'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \App\Http\Resources\MenuResource
     */
    public function show(Menu $menu)
    {
        return new MenuResource($menu->load('parentMenu', 'module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $menu->update($request->validated());

        return new MenuResource($menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return response()->noContent();
    }
}
