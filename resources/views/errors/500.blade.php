@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Server Error</div>
                <div class="card-body text-center">
                    <h1 class="display-1">500</h1>
                    <p class="lead">Oops! Something went wrong on our servers.</p>
                    <img src="{{ asset('assets/icons/500.svg') }}" alt="500 Error" class="img-fluid mb-4" style="max-height: 200px;">
                    <div>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Return to Dashboard</a>
                        <button onclick="window.location.reload()" class="btn btn-secondary ml-2">Try Again</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection