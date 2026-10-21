<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Deployment;
use App\Models\Designation;
use App\Models\Redeployment;
use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RedeploymentController
 */
final class RedeploymentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $redeployments = Redeployment::factory()->count(3)->create();

        $response = $this->get(route('redeployments.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RedeploymentController::class,
            'store',
            \App\Http\Requests\RedeploymentStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $unit = Unit::factory()->create();
        $designation = Designation::factory()->create();
        $request_type = fake()->randomElement(/** enum_attributes **/);
        $deployment = Deployment::factory()->create();
        $effective_date = Carbon::parse(fake()->date());

        $response = $this->post(route('redeployments.store'), [
            'unit_id' => $unit->id,
            'designation_id' => $designation->id,
            'request_type' => $request_type,
            'deployment_id' => $deployment->id,
            'effective_date' => $effective_date->toDateString(),
        ]);

        $redeployments = Redeployment::query()
            ->where('unit_id', $unit->id)
            ->where('designation_id', $designation->id)
            ->where('request_type', $request_type)
            ->where('deployment_id', $deployment->id)
            ->where('effective_date', $effective_date)
            ->get();
        $this->assertCount(1, $redeployments);
        $redeployment = $redeployments->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $redeployment = Redeployment::factory()->create();

        $response = $this->get(route('redeployments.show', $redeployment));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RedeploymentController::class,
            'update',
            \App\Http\Requests\RedeploymentUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $redeployment = Redeployment::factory()->create();
        $unit = Unit::factory()->create();
        $designation = Designation::factory()->create();
        $request_type = fake()->randomElement(/** enum_attributes **/);
        $deployment = Deployment::factory()->create();
        $effective_date = Carbon::parse(fake()->date());

        $response = $this->put(route('redeployments.update', $redeployment), [
            'unit_id' => $unit->id,
            'designation_id' => $designation->id,
            'request_type' => $request_type,
            'deployment_id' => $deployment->id,
            'effective_date' => $effective_date->toDateString(),
        ]);

        $redeployment->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($unit->id, $redeployment->unit_id);
        $this->assertEquals($designation->id, $redeployment->designation_id);
        $this->assertEquals($request_type, $redeployment->request_type);
        $this->assertEquals($deployment->id, $redeployment->deployment_id);
        $this->assertEquals($effective_date, $redeployment->effective_date);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $redeployment = Redeployment::factory()->create();

        $response = $this->delete(route('redeployments.destroy', $redeployment));

        $response->assertNoContent();

        $this->assertModelMissing($redeployment);
    }
}
