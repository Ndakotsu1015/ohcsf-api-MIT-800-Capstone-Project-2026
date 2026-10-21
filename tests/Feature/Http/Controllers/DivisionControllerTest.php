<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DivisionController
 */
final class DivisionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $divisions = Division::factory()->count(3)->create();

        $response = $this->get(route('divisions.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DivisionController::class,
            'store',
            \App\Http\Requests\DivisionStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = fake()->name();
        $department = Department::factory()->create();

        $response = $this->post(route('divisions.store'), [
            'name' => $name,
            'department_id' => $department->id,
        ]);

        $divisions = Division::query()
            ->where('name', $name)
            ->where('department_id', $department->id)
            ->get();
        $this->assertCount(1, $divisions);
        $division = $divisions->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $division = Division::factory()->create();

        $response = $this->get(route('divisions.show', $division));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DivisionController::class,
            'update',
            \App\Http\Requests\DivisionUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $division = Division::factory()->create();
        $name = fake()->name();
        $department = Department::factory()->create();

        $response = $this->put(route('divisions.update', $division), [
            'name' => $name,
            'department_id' => $department->id,
        ]);

        $division->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $division->name);
        $this->assertEquals($department->id, $division->department_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $division = Division::factory()->create();

        $response = $this->delete(route('divisions.destroy', $division));

        $response->assertNoContent();

        $this->assertModelMissing($division);
    }
}
