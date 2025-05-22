@extends('layouts.master')


    <style>
        .custom-table {
            width: 60%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 15px;
        }

        .custom-table th,
        .custom-table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;


        }


        .custom-table thead th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .custom-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>


@section('content')
<div class="container mt-4">
    <h1>Employee Details</h1>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Back</a>




<table class="custom-table">

 <tr>
    <th>ID</th>
    <th> {{ $employee->id }}</th>
  </tr>
  <tr >
    <td >Full Name (Arabic)</td>
    <td>{{ $employee->full_name_ar }}</td>

  </tr>
  <tr>
    <td>Full Name (English)</td>
    <td>{{ $employee->full_name_en }}</td>

  </tr>
  <tr>
    <td>Personal Email</td>
    <td>{{ $employee->personal_email }}</td>

  </tr>
  <tr>
    <td>Corporate Email</td>
    <td>{{ $employee->corporate_email }}</td>

  </tr>
  <tr>
    <td>Phone Number</td>
    <td>{{ $employee->phone_number }}</td>

  </tr>
  <tr>
    <td>WhatsApp Number</td>
    <td>{{ $employee->profile->whatsapp_number }}</td>
  </tr>
    <tr>
    <td>Birth Date</td>
    <td>{{ $employee->profile->date_of_birth }}</td>
  </tr>
    <tr>
    <td>Recruitment Date</td>
    <td>{{ $employee->profile->hire_date }}</td>
  </tr>
    <tr>
    <td>Passport Number</td>
    <td>{{ $employee->profile->identification_id_type  }}</td>
  </tr>
    <tr>
    <td>National ID</td>
    <td>{{ $employee->profile->identification_id  }}</td>
  </tr>
    <tr>
    <td>Branch</td>
    <td>{{ $employee->branch_id }}</td>
  </tr>
    <tr>
    <td>Biometric</td>
    <td>{{ $employee->profile->biometric }}</td>
  </tr>
    <tr>
    <td>Gender</td>
    <td>{{ ucfirst($employee->profile->gender) }}</td>
  </tr>
    <tr>
    <td>Nationality</td>
    <td>{{ $employee->profile->nationality }}</td>
  </tr>
    {{-- <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
  </tr>
    <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
  </tr> --}}

      </tbody>
</table>



    {{-- <table class="table"> --}}

       {{--  <tr><th>ID</th><td>{{ $employee->id }}</td></tr>
        <tr><th>Full Name (Arabic)</th><td>{{ $employee->full_name_ar }}</td></tr>
        <tr><th>Full Name (English)</th><td>{{ $employee->full_name_en }}</td></tr>
        <tr><th>Personal Email</th><td>{{ $employee->personal_email }}</td></tr>
        <tr><th>Corporate Email</th><td>{{ $employee->corporate_email }}</td></tr>
        <tr><th>Phone Number</th><td>{{ $employee->phone_number }}</td></tr>
        <tr><th>WhatsApp Number</th><td>{{ $employee->profile->whatsapp_number }}</td></tr>
        {{-- <tr><th>Department</th><td>{{ $employee->department_id }}</td></tr>
        <tr><th>Role</th><td>{{ $employee->profile->role }}</td></tr>
        <tr><th>Birth Date</th><td>{{ $employee->profile->date_of_birth }}</td></tr>
        <tr><th>Recruitment Date</th><td>{{ $employee->profile->hire_date }}</td></tr>
        <tr><th>Passport Number</th><td>{{ $employee->profile->identification_id_type  }}</td></tr>
        <tr><th>National ID</th><td>{{ $employee->profile->identification_id  }}</td></tr>
        {{-- <tr><th>Branch</th><td>{{ $employee->branch_id }}</td></tr>
        <tr><th>Biometric</th><td>{{ $employee->profile->biometric }}</td></tr>
        <tr><th>Gender</th><td>{{ ucfirst($employee->profile->gender) }}</td></tr>
        <tr><th>Nationality</th><td>{{ $employee->profile->nationality }}</td></tr>--}}



    {{-- </table> --}}
</div>
@endsection
