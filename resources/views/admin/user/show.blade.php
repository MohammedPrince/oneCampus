@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1>Employee Details</h1>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Back</a>

    <table class="table">
        <tr><th>ID</th><td>{{ $employee->id }}</td></tr>
        <tr><th>Full Name (Arabic)</th><td>{{ $employee->full_name_ar }}</td></tr>
        <tr><th>Full Name (English)</th><td>{{ $employee->full_name_en }}</td></tr>
        <tr><th>Personal Email</th><td>{{ $employee->personal_email }}</td></tr>
        <tr><th>Corporate Email</th><td>{{ $employee->corporate_email }}</td></tr>
        <tr><th>Phone Number</th><td>{{ $employee->phone_number }}</td></tr>
        <tr><th>WhatsApp Number</th><td>{{ $employee->profile->whatsapp_number }}</td></tr>
        {{-- <tr><th>Department</th><td>{{ $employee->department_id }}</td></tr>
        <tr><th>Role</th><td>{{ $employee->profile->role }}</td></tr> --}}
        <tr><th>Birth Date</th><td>{{ $employee->profile->date_of_birth }}</td></tr>
        <tr><th>Recruitment Date</th><td>{{ $employee->profile->hire_date }}</td></tr>
        <tr><th>Passport Number</th><td>{{ $employee->profile->identification_id_type  }}</td></tr>
        <tr><th>National ID</th><td>{{ $employee->profile->identification_id  }}</td></tr>
        {{-- <tr><th>Branch</th><td>{{ $employee->branch_id }}</td></tr> --}}
        <tr><th>Biometric</th><td>{{ $employee->profile->biometric }}</td></tr>
        <tr><th>Gender</th><td>{{ ucfirst($employee->profile->gender) }}</td></tr>
        <tr><th>Nationality</th><td>{{ $employee->profile->nationality }}</td></tr>
        <tr>
            <th>CV</th>
            <td>
                @if($employee->profile->cv)
                    <a href="{{ Storage::url($employee->profile->cv) }}" target="_blank" class="btn btn-primary btn-sm">
                        <i class="fas fa-file-pdf"></i> View CV
                    </a>
                @else
                    <span class="text-muted">No CV uploaded</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Certificate</th>
            <td>
                @if($employee->profile->certificates)
                    <a href="{{ Storage::url($employee->profile->certificates) }}" target="_blank" class="btn btn-primary btn-sm">
                        <i class="fas fa-file-pdf"></i> View Certificate
                    </a>
                @else
                    <span class="text-muted">No Certificate uploaded</span>
                @endif
            </td>
        </tr>
    </table>
</div>
@endsection
