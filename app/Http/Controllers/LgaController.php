<?php

namespace App\Http\Controllers;

use App\Http\Requests\LgaStoreRequest;
use App\Http\Requests\LgaUpdateRequest;
use App\Http\Resources\LgaCollection;
use App\Http\Resources\LgaResource;
use App\Models\Lga;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LgaController extends Controller
{
    public function index(Request $request): LgaCollection
    {
        $lgas = Lga::all();

        return new LgaCollection($lgas);
    }

    public function store(LgaStoreRequest $request): LgaResource
    {
        $lga = Lga::create($request->validated());

        return new LgaResource($lga);
    }

    public function show(Request $request, Lga $lga): LgaResource
    {
        return new LgaResource($lga);
    }

    public function update(LgaUpdateRequest $request, Lga $lga): LgaResource
    {
        $lga->update($request->validated());

        return new LgaResource($lga);
    }

    public function destroy(Request $request, Lga $lga): Response
    {
        $lga->delete();

        return response()->noContent();
    }
}
