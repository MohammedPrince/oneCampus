
@extends('layouts.master')
@section('content')
{{Auth::user()->role->name}}    
@endsection