@extends('layouts.master')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Exam Officer Dashboard</h4>
                </div>
                <div class="card-body">
                    <p>Role: {{ Auth::user()->role->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
