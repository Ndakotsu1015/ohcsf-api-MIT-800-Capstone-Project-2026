<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Lga;
use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LgaController
 */
final class LgaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $lgas = Lga::factory()->count(3)->create();

        $response = $this->get(route('lgas.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LgaController::class,
            'store',
            \App\Http\Requests\LgaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = fake()->name();
        $state = State::factory()->create();

        $response = $this->post(route('lgas.store'), [
            'name' => $name,
            'state_id' => $state->id,
        ]);

        $lgas = Lga::query()
            ->where('name', $name)
            ->where('state_id', $state->id)
            ->get();
        $this->assertCount(1, $lgas);
        $lga = $lgas->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $lga = Lga::factory()->create();

        $response = $this->get(route('lgas.show', $lga));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LgaController::class,
            'update',
            \App\Http\Requests\LgaUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $lga = Lga::factory()->create();
        $name = fake()->name();
        $state = State::factory()->create();

        $response = $this->put(route('lgas.update', $lga), [
            'name' => $name,
            'state_id' => $state->id,
        ]);

        $lga->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $lga->name);
        $this->assertEquals($state->id, $lga->state_id);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $lga = Lga::factory()->create();

        $response = $this->delete(route('lgas.destroy', $lga));

        $response->assertNoContent();

        $this->assertModelMissing($lga);
    }
}
