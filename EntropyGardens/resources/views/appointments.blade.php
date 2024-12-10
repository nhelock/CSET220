@extends('layouts.app')

@section('title', 'Appointments')

@section('content')

    <p>Hello</p>
    <?php if(!isset($data)){ ?>
    <form action=/appointments/search method=get>
        <label for=userID_Patient>Patient ID:</label>
        <input type=number name=userID_Patient placeholder="Patient ID">

        <label for=date>Date</label>
        <input type=date name=date>

        <button type=submit>Search</button>
    </form>
    <?php } ?>

    <?php if(isset($data)){ ?>

    {{-- <p>Sent Data:</p>
    <p>Date: {{ $data['date'] }}</p>
    <p>UserID_Patient: {{ $data['userID_Patient'] }}</p>
    <p>Patient Name: {{ $patientName }}</p>

    <p>Doctor Name: {{ $doctorName }}</p>
    <p>Doctor ID: {{ $doctorID }}</p> --}}

    <h1>Make Appointment</h1>
    <h3>Doctor On-Duty: {{ $doctorName }}</h3>
    <h3>Date Scheduled: {{ $data['date'] }}</h3>
    <h3>For: {{ $patientName }}</h3>
    <form action=/api/appointment/new method=post>
        @csrf
        <input type=hidden name=userID_Doctor value={{ $doctorID }}>
        <input type=hidden name=date value={{ $data['date'] }}>
        <input type=hidden name=userID_Patient value={{ $data['userID_Patient'] }}>

        <button type=submit>Make Appointment</button>
        
    </form>

    <?php } ?>

    

@endsection