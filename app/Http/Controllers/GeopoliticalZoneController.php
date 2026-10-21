<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeopoliticalZoneStoreRequest;
use App\Http\Requests\GeopoliticalZoneUpdateRequest;
use App\Http\Resources\GeopoliticalZoneCollection;
use App\Http\Resources\GeopoliticalZoneResource;
use App\Models\GeopoliticalZone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeopoliticalZoneController extends Controller
{
    public function index(Request $request): GeopoliticalZoneCollection
    {
        $geopoliticalZones = GeopoliticalZone::all();

        return new GeopoliticalZoneCollection($geopoliticalZones);
    }

    public function store(GeopoliticalZoneStoreRequest $request): GeopoliticalZoneResource
    {
        $geopoliticalZone = GeopoliticalZone::create($request->validated());

        return new GeopoliticalZoneResource($geopoliticalZone);
    }

    public function show(Request $request, GeopoliticalZone $geopoliticalZone): GeopoliticalZoneResource
    {
        return new GeopoliticalZoneResource($geopoliticalZone);
    }

    public function update(GeopoliticalZoneUpdateRequest $request, GeopoliticalZone $geopoliticalZone): GeopoliticalZoneResource
    {
        $geopoliticalZone->update($request->validated());

        return new GeopoliticalZoneResource($geopoliticalZone);
    }

    public function destroy(Request $request, GeopoliticalZone $geopoliticalZone): Response
    {
        $geopoliticalZone->delete();

        return response()->noContent();
    }
}
