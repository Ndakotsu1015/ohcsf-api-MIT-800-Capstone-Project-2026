<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cadre;
use App\Models\GradeLevel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GradeLevelController
 */
final class GradeLevelControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $gradeLevels = GradeLevel::factory()->count(3)->create();

        $response = $this->get(route('grade-levels.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GradeLevelController::class,
            'store',
            \App\Http\Requests\GradeLevelStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $level = fake()->word();
        $cadre = Cadre::factory()->create();

        $response = $this->post(route('grade-levels.store'), [
            'level' => $level,
            'cadre_id' => $cadre->id,
        ]);

        $gradeLevels = GradeLevel::query()
            ->where('level', $level)
            ->where('cadre_id', $cadre->id)
            ->get();
        $this->assertCount(1, $gradeLevels);
        $gradeLevel = $gradeLevels->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $gradeLevel = GradeLevel::factory()->create();

        $response = $this->get(route('grade-levels.show', $gradeLevel));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GradeLevelController::class,
            'update',
            \App\Http\Requests\GradeLevelUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $gradeLevel = GradeLevel::factory()->create();
        $level = fake()->word();
        $cadre = Cadre::factory()->create();

        $response = $this->put(route('grade-levels.update', $gradeLevel), [
            'level' => $level,
            'cadre_id' => $cadre->id,
        ]);

        $gradeLevel->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($level, $gradeLevel->level);
        $this->assertEquals($cadre->id, $gradeLevel->cadre_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $gradeLevel = GradeLevel::factory()->create();

        $response = $this->delete(route('grade-levels.destroy', $gradeLevel));

        $response->assertNoContent();

        $this->assertModelMissing($gradeLevel);
    }
}
