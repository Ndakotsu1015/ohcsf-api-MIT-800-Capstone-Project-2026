<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Deployment;
use App\Models\Designation;
use App\Models\Lga;
use App\Models\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DeploymentController
 */
final class DeploymentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $deployments = Deployment::factory()->count(3)->create();

        $response = $this->get(route('deployments.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DeploymentController::class,
            'store',
            \App\Http\Requests\DeploymentStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $title = fake()->sentence(4);
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $date_birth = Carbon::parse(fake()->date());
        $assuption_duty_date = Carbon::parse(fake()->date());
        $deployment_report_date = Carbon::parse(fake()->date());
        $gender = fake()->randomElement(/** enum_attributes **/);
        $marital_status = fake()->randomElement(/** enum_attributes **/);
        $residential_address = fake()->text();
        $permanent_address = fake()->text();
        $phone_number = fake()->phoneNumber();
        $nationality = fake()->word();
        $nin = fake()->word();
        $lga = Lga::factory()->create();
        $email_address = fake()->word();
        $IPPS_no = fake()->word();
        $employee_no = fake()->word();
        $designation = Designation::factory()->create();
        $unit = Unit::factory()->create();
        $cadre = fake()->randomElement(/** enum_attributes **/);
        $grade_level = fake()->randomElement(/** enum_attributes **/);
        $qualification = fake()->;

        $response = $this->post(route('deployments.store'), [
            'title' => $title,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'date_birth' => $date_birth->toDateString(),
            'assuption_duty_date' => $assuption_duty_date->toDateString(),
            'deployment_report_date' => $deployment_report_date->toDateString(),
            'gender' => $gender,
            'marital_status' => $marital_status,
            'residential_address' => $residential_address,
            'permanent_address' => $permanent_address,
            'phone_number' => $phone_number,
            'nationality' => $nationality,
            'nin' => $nin,
            'lga_id' => $lga->id,
            'email_address' => $email_address,
            'IPPS_no' => $IPPS_no,
            'employee_no' => $employee_no,
            'designation_id' => $designation->id,
            'unit_id' => $unit->id,
            'cadre' => $cadre,
            'grade_level' => $grade_level,
            'qualification' => $qualification,
        ]);

        $deployments = Deployment::query()
            ->where('title', $title)
            ->where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('date_birth', $date_birth)
            ->where('assuption_duty_date', $assuption_duty_date)
            ->where('deployment_report_date', $deployment_report_date)
            ->where('gender', $gender)
            ->where('marital_status', $marital_status)
            ->where('residential_address', $residential_address)
            ->where('permanent_address', $permanent_address)
            ->where('phone_number', $phone_number)
            ->where('nationality', $nationality)
            ->where('nin', $nin)
            ->where('lga_id', $lga->id)
            ->where('email_address', $email_address)
            ->where('IPPS_no', $IPPS_no)
            ->where('employee_no', $employee_no)
            ->where('designation_id', $designation->id)
            ->where('unit_id', $unit->id)
            ->where('cadre', $cadre)
            ->where('grade_level', $grade_level)
            ->where('qualification', $qualification)
            ->get();
        $this->assertCount(1, $deployments);
        $deployment = $deployments->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $deployment = Deployment::factory()->create();

        $response = $this->get(route('deployments.show', $deployment));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DeploymentController::class,
            'update',
            \App\Http\Requests\DeploymentUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $deployment = Deployment::factory()->create();
        $title = fake()->sentence(4);
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $date_birth = Carbon::parse(fake()->date());
        $assuption_duty_date = Carbon::parse(fake()->date());
        $deployment_report_date = Carbon::parse(fake()->date());
        $gender = fake()->randomElement(/** enum_attributes **/);
        $marital_status = fake()->randomElement(/** enum_attributes **/);
        $residential_address = fake()->text();
        $permanent_address = fake()->text();
        $phone_number = fake()->phoneNumber();
        $nationality = fake()->word();
        $nin = fake()->word();
        $lga = Lga::factory()->create();
        $email_address = fake()->word();
        $IPPS_no = fake()->word();
        $employee_no = fake()->word();
        $designation = Designation::factory()->create();
        $unit = Unit::factory()->create();
        $cadre = fake()->randomElement(/** enum_attributes **/);
        $grade_level = fake()->randomElement(/** enum_attributes **/);
        $qualification = fake()->;

        $response = $this->put(route('deployments.update', $deployment), [
            'title' => $title,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'date_birth' => $date_birth->toDateString(),
            'assuption_duty_date' => $assuption_duty_date->toDateString(),
            'deployment_report_date' => $deployment_report_date->toDateString(),
            'gender' => $gender,
            'marital_status' => $marital_status,
            'residential_address' => $residential_address,
            'permanent_address' => $permanent_address,
            'phone_number' => $phone_number,
            'nationality' => $nationality,
            'nin' => $nin,
            'lga_id' => $lga->id,
            'email_address' => $email_address,
            'IPPS_no' => $IPPS_no,
            'employee_no' => $employee_no,
            'designation_id' => $designation->id,
            'unit_id' => $unit->id,
            'cadre' => $cadre,
            'grade_level' => $grade_level,
            'qualification' => $qualification,
        ]);

        $deployment->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $deployment->title);
        $this->assertEquals($first_name, $deployment->first_name);
        $this->assertEquals($last_name, $deployment->last_name);
        $this->assertEquals($date_birth, $deployment->date_birth);
        $this->assertEquals($assuption_duty_date, $deployment->assuption_duty_date);
        $this->assertEquals($deployment_report_date, $deployment->deployment_report_date);
        $this->assertEquals($gender, $deployment->gender);
        $this->assertEquals($marital_status, $deployment->marital_status);
        $this->assertEquals($residential_address, $deployment->residential_address);
        $this->assertEquals($permanent_address, $deployment->permanent_address);
        $this->assertEquals($phone_number, $deployment->phone_number);
        $this->assertEquals($nationality, $deployment->nationality);
        $this->assertEquals($nin, $deployment->nin);
        $this->assertEquals($lga->id, $deployment->lga_id);
        $this->assertEquals($email_address, $deployment->email_address);
        $this->assertEquals($IPPS_no, $deployment->IPPS_no);
        $this->assertEquals($employee_no, $deployment->employee_no);
        $this->assertEquals($designation->id, $deployment->designation_id);
        $this->assertEquals($unit->id, $deployment->unit_id);
        $this->assertEquals($cadre, $deployment->cadre);
        $this->assertEquals($grade_level, $deployment->grade_level);
        $this->assertEquals($qualification, $deployment->qualification);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $deployment = Deployment::factory()->create();

        $response = $this->delete(route('deployments.destroy', $deployment));

        $response->assertNoContent();

        $this->assertModelMissing($deployment);
    }
}
