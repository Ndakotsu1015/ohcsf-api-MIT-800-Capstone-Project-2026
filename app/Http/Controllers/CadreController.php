<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadreStoreRequest;
use App\Http\Requests\CadreUpdateRequest;
use App\Http\Resources\CadreCollection;
use App\Http\Resources\CadreResource;
use App\Models\Cadre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CadreController extends Controller
{
    public function index(Request $request): CadreCollection
    {
        $cadres = Cadre::all();

        return new CadreCollection($cadres);
    }

    public function store(CadreStoreRequest $request): CadreResource
    {
        $cadre = Cadre::create($request->validated());

        return new CadreResource($cadre);
    }

    public function show(Request $request, Cadre $cadre): CadreResource
    {
        return new CadreResource($cadre);
    }

    public function update(CadreUpdateRequest $request, Cadre $cadre): CadreResource
    {
        $cadre->update($request->validated());

        return new CadreResource($cadre);
    }

    public function destroy(Request $request, Cadre $cadre): Response
    {
        $cadre->delete();

        return response()->noContent();
    }
}
