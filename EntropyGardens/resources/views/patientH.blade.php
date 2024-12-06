@extends('layouts.app')

@section('title', 'Patient Home')

@section('content')

    <h1>Welcome {{ session('userID') }}</h1>

@endsection