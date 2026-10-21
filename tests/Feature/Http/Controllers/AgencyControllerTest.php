<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Agency;
use App\Models\Ministry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AgencyController
 */
final class AgencyControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $agencies = Agency::factory()->count(3)->create();

        $response = $this->get(route('agencies.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AgencyController::class,
            'store',
            \App\Http\Requests\AgencyStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = fake()->name();
        $ministry = Ministry::factory()->create();

        $response = $this->post(route('agencies.store'), [
            'name' => $name,
            'ministry_id' => $ministry->id,
        ]);

        $agencies = Agency::query()
            ->where('name', $name)
            ->where('ministry_id', $ministry->id)
            ->get();
        $this->assertCount(1, $agencies);
        $agency = $agencies->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $agency = Agency::factory()->create();

        $response = $this->get(route('agencies.show', $agency));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AgencyController::class,
            'update',
            \App\Http\Requests\AgencyUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $agency = Agency::factory()->create();
        $name = fake()->name();
        $ministry = Ministry::factory()->create();

        $response = $this->put(route('agencies.update', $agency), [
            'name' => $name,
            'ministry_id' => $ministry->id,
        ]);

        $agency->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $agency->name);
        $this->assertEquals($ministry->id, $agency->ministry_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $agency = Agency::factory()->create();

        $response = $this->delete(route('agencies.destroy', $agency));

        $response->assertNoContent();

        $this->assertModelMissing($agency);
    }
}
