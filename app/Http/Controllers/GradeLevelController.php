<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeLevelStoreRequest;
use App\Http\Requests\GradeLevelUpdateRequest;
use App\Http\Resources\GradeLevelCollection;
use App\Http\Resources\GradeLevelResource;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GradeLevelController extends Controller
{
    public function index(Request $request): GradeLevelCollection
    {
        $gradeLevels = GradeLevel::all();

        return new GradeLevelCollection($gradeLevels);
    }

    public function store(GradeLevelStoreRequest $request): GradeLevelResource
    {
        $gradeLevel = GradeLevel::create($request->validated());

        return new GradeLevelResource($gradeLevel);
    }

    public function show(Request $request, GradeLevel $gradeLevel): GradeLevelResource
    {
        return new GradeLevelResource($gradeLevel);
    }

    public function update(GradeLevelUpdateRequest $request, GradeLevel $gradeLevel): GradeLevelResource
    {
        $gradeLevel->update($request->validated());

        return new GradeLevelResource($gradeLevel);
    }

    public function destroy(Request $request, GradeLevel $gradeLevel): Response
    {
        $gradeLevel->delete();

        return response()->noContent();
    }
}
