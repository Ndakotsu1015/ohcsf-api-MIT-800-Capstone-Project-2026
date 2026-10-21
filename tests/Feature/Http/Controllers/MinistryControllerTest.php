<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Ministry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MinistryController
 */
final class MinistryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $ministries = Ministry::factory()->count(3)->create();

        $response = $this->get(route('ministries.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MinistryController::class,
            'store',
            \App\Http\Requests\MinistryStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = fake()->name();

        $response = $this->post(route('ministries.store'), [
            'name' => $name,
        ]);

        $ministries = Ministry::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $ministries);
        $ministry = $ministries->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $ministry = Ministry::factory()->create();

        $response = $this->get(route('ministries.show', $ministry));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MinistryController::class,
            'update',
            \App\Http\Requests\MinistryUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $ministry = Ministry::factory()->create();
        $name = fake()->name();

        $response = $this->put(route('ministries.update', $ministry), [
            'name' => $name,
        ]);

        $ministry->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $ministry->name);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $ministry = Ministry::factory()->create();

        $response = $this->delete(route('ministries.destroy', $ministry));

        $response->assertNoContent();

        $this->assertModelMissing($ministry);
    }
}
