<?php

namespace App\Http\Controllers;

use App\Http\Requests\MinistryStoreRequest;
use App\Http\Requests\MinistryUpdateRequest;
use App\Http\Resources\MinistryCollection;
use App\Http\Resources\MinistryResource;
use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MinistryController extends Controller
{
    public function index(Request $request): MinistryCollection
    {
        $ministries = Ministry::all();

        return new MinistryCollection($ministries);
    }

    public function store(MinistryStoreRequest $request): MinistryResource
    {
        $ministry = Ministry::create($request->validated());

        return new MinistryResource($ministry);
    }

    public function show(Request $request, Ministry $ministry): MinistryResource
    {
        return new MinistryResource($ministry);
    }

    public function update(MinistryUpdateRequest $request, Ministry $ministry): MinistryResource
    {
        $ministry->update($request->validated());

        return new MinistryResource($ministry);
    }

    public function destroy(Request $request, Ministry $ministry): Response
    {
        $ministry->delete();

        return response()->noContent();
    }
}
