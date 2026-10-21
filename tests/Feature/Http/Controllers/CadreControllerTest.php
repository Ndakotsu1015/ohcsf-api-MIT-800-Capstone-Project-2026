<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cadre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CadreController
 */
final class CadreControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $cadres = Cadre::factory()->count(3)->create();

        $response = $this->get(route('cadres.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CadreController::class,
            'store',
            \App\Http\Requests\CadreStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $name = fake()->name();

        $response = $this->post(route('cadres.store'), [
            'name' => $name,
        ]);

        $cadres = Cadre::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $cadres);
        $cadre = $cadres->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $cadre = Cadre::factory()->create();

        $response = $this->get(route('cadres.show', $cadre));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CadreController::class,
            'update',
            \App\Http\Requests\CadreUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $cadre = Cadre::factory()->create();
        $name = fake()->name();

        $response = $this->put(route('cadres.update', $cadre), [
            'name' => $name,
        ]);

        $cadre->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $cadre->name);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $cadre = Cadre::factory()->create();

        $response = $this->delete(route('cadres.destroy', $cadre));

        $response->assertNoContent();

        $this->assertModelMissing($cadre);
    }
}
