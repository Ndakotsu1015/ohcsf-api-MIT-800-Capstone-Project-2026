<!DOCTYPE html>
<html>
<head>
    <title>Deployment Details</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .container { width: 100%; padding: 20px; }
        .header { text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 20px; }
        .details { border-collapse: collapse; width: 100%; }
        .details td, .details th { border: 1px solid #ddd; padding: 8px; }
        .details th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <div>
         <img src="{{ public_path('assets/images/ohcsf-header.png') }}"
         style="width: 100%; height: 120px;"
         alt="Ohcsf Logo">

        </div>

        <div class="header">Deployment Letter</div>
        <p style="text-align: left;">
            Office of the Head of the Civil Service of the Federation, <br/>
            Federal Secretariat Complex, <br/>
            Phase II, <br/>
            Shehu Shagari Way, <br/>
            Three Arms Zone,<br/>
            FCT, Abuja.<br/>
        </p>
        <div style="text-align: left;">
       Date: <strong> {{ \Carbon\Carbon::parse($deployment->created_at)->format('l, jS F Y') }}</strong>
        <br/>
        <strong>To:</strong>
        <br/>
        <br/>
       Employee Full Name: <strong> {{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</strong> <br/>
        Designation: <strong>{{ $deployment->designation->name }}</strong> <br/>
        MDA's:<strong> {{ $deployment->unit->division->department->branch->relation->name}} </strong>
         <br/> <br/>
        </div>

        <div class="header"> <b> Department Posted to: </b> {{$deployment->unit->division->department->name}} </div>

        <p>
        I am directed to inform you that in line with the Public Service Rules (PSR) and the needs of the service, you have been posted to <strong>{{ $deployment->unit->division->department->branch->relation->name}} </strong> as a <strong>{{ $deployment->designation->name }}</strong> with effect from <strong>{{ \Carbon\Carbon::parse($deployment->expected_assumption_date)->format('l, jS F Y') }}</strong>

        You are required to assume duty immediately and report to the <strong>Permanent Secretary/HOD</strong> of <strong> {{ $deployment->unit->division->department->branch->relation->name}} </strong> for further directives. Kindly ensure that all handing-over formalities are completed before your departure from your current station.
        Please accept the assurances of my highest regard.
        </p>

           <strong>Yours sincerely,</strong> <br/>
           <br/>
           <Strong>Hr Career Management Office (CMO)</Strong>
           <div> Designation:  <strong>Permanent Secretary</strong> </div>
           <div><b> Office of the Head of the Civil Service of the Federation </b></div>
           <strong>CC:</strong>

           <ul>
            <li>
            Permanent Secretary: <strong> {{ $deployment->unit->division->department->branch->relation->name}} </strong>
            </li>
            <li>
            Director, Human Resources: <strong> {{ $deployment->unit->division->department->branch->relation->name}} </strong>
            </li>
            <li>
            Officer’s Personnel File
            </li>
           </ul>
    </div>
</body>
</html>
