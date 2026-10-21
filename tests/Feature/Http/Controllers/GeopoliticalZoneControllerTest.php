<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\GeopoliticalZone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GeopoliticalZoneController
 */
final class GeopoliticalZoneControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $geopoliticalZones = GeopoliticalZone::factory()->count(3)->create();

        $response = $this->get(route('geopolitical-zones.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GeopoliticalZoneController::class,
            'store',
            \App\Http\Requests\GeopoliticalZoneStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = fake()->name();

        $response = $this->post(route('geopolitical-zones.store'), [
            'name' => $name,
        ]);

        $geopoliticalZones = GeopoliticalZone::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $geopoliticalZones);
        $geopoliticalZone = $geopoliticalZones->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $geopoliticalZone = GeopoliticalZone::factory()->create();

        $response = $this->get(route('geopolitical-zones.show', $geopoliticalZone));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GeopoliticalZoneController::class,
            'update',
            \App\Http\Requests\GeopoliticalZoneUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $geopoliticalZone = GeopoliticalZone::factory()->create();
        $name = fake()->name();

        $response = $this->put(route('geopolitical-zones.update', $geopoliticalZone), [
            'name' => $name,
        ]);

        $geopoliticalZone->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $geopoliticalZone->name);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $geopoliticalZone = GeopoliticalZone::factory()->create();

        $response = $this->delete(route('geopolitical-zones.destroy', $geopoliticalZone));

        $response->assertNoContent();

        $this->assertModelMissing($geopoliticalZone);
    }
}
