<!DOCTYPE html>
<html>
<head>
<style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .container { width: 100%; padding: 20px; }
    </style>
    <title>Deployment Notification</title>
</head>
<body>
    <div class="container">
        <div>
        <img src="{{ asset('assets/images/ohcsf-header.png') }}"
     style="width: 90%; height: 120px;"
     alt="Ohcsf Logo">
    <h2>Hello {{ $employee->first_name }} {{ $employee->middle_name }} {{ $employee->last_name }},</h2>
    <p>We are pleased to inform you that you have been deployed to:</p>

    <ul>
        <li><strong>MDA's:</strong> {{ $deployment->unit->division->department->branch->relation->name }}</li>
        <li><strong>Department:</strong> {{ $deployment->unit->division->department->name }}</li>
        <li><strong>Division:</strong> {{ $deployment->unit->division->name }}</li>
        <li><strong>Unit:</strong> {{ $deployment->unit->name }}</li>
        <li><strong>Designation:</strong> {{ $deployment->designation->name }}</li>
        <li><strong>Assumption Date:</strong> {{ $deployment->assumption_duty_date }}</li>
        <li><strong>Cadre:</strong> {{ $deployment->cadre->name }}</li>
        <li><strong>Grade Level:</strong> {{ $deployment->gradeLevel->name }}</li>
    </ul>

    <p>Please find attached your deployment details in PDF format.</p>

    <p>Best Regards,</p>
    <p><strong>HR Department</strong></p>
    </div>
</body>
</html>
