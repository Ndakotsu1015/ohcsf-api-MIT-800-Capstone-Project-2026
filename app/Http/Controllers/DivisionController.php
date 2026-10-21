<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisionStoreRequest;
use App\Http\Requests\DivisionUpdateRequest;
use App\Http\Resources\DivisionCollection;
use App\Http\Resources\DivisionResource;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DivisionController extends Controller
{
    public function index(Request $request): DivisionCollection
    {
        $divisions = Division::all();

        return new DivisionCollection($divisions);
    }

    public function store(DivisionStoreRequest $request): DivisionResource
    {
        $division = Division::create($request->validated());

        return new DivisionResource($division);
    }

    public function show(Request $request, Division $division): DivisionResource
    {
        return new DivisionResource($division);
    }

    public function update(DivisionUpdateRequest $request, Division $division): DivisionResource
    {
        $division->update($request->validated());

        return new DivisionResource($division);
    }

    public function destroy(Request $request, Division $division): Response
    {
        $division->delete();

        return response()->noContent();
    }
}
