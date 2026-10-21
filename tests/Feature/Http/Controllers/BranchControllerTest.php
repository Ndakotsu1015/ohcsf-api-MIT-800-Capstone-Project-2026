<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Branch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BranchController
 */
final class BranchControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $branches = Branch::factory()->count(3)->create();

        $response = $this->get(route('branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BranchController::class,
            'store',
            \App\Http\Requests\BranchStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = fake()->name();
        $relation_id = fake()->word();
        $source = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('branches.store'), [
            'name' => $name,
            'relation_id' => $relation_id,
            'source' => $source,
        ]);

        $branches = Branch::query()
            ->where('name', $name)
            ->where('relation_id', $relation_id)
            ->where('source', $source)
            ->get();
        $this->assertCount(1, $branches);
        $branch = $branches->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $branch = Branch::factory()->create();

        $response = $this->get(route('branches.show', $branch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BranchController::class,
            'update',
            \App\Http\Requests\BranchUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $branch = Branch::factory()->create();
        $name = fake()->name();
        $relation_id = fake()->word();
        $source = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('branches.update', $branch), [
            'name' => $name,
            'relation_id' => $relation_id,
            'source' => $source,
        ]);

        $branch->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $branch->name);
        $this->assertEquals($relation_id, $branch->relation_id);
        $this->assertEquals($source, $branch->source);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $branch = Branch::factory()->create();

        $response = $this->delete(route('branches.destroy', $branch));

        $response->assertNoContent();

        $this->assertModelMissing($branch);
    }
}
