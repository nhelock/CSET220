@extends('layouts.app')

@section('title', 'Appointments')

@section('content')
    <link rel=stylesheet href={{ asset('/CSS/patientOfDoctor.css') }}>

    <?php if(!isset($data)){ ?>
    <h1 class=titles>Search for User for Appointment Scheduling</h1>
    <form action=/appointments/search method=get>
        <table class=prescription>
            <tr>
                <th><label for=userID_Patient>Patient ID:</label></th>
                <th><input type=number name=userID_Patient placeholder="Patient ID"></th>
            </tr>
            <tr>
                <th><label for=date>Date</label></th>
                <th><input type=date name=date></th>
            </tr>
            <tr>
                <th></th>
                <th><button type=submit class=prescription-button>Search</button></th>
            </tr>
        </table>
        
    </form>
    <?php } ?>

    <?php if(isset($data)){ ?>

    {{-- <p>Sent Data:</p>
    <p>Date: {{ $data['date'] }}</p>
    <p>UserID_Patient: {{ $data['userID_Patient'] }}</p>
    <p>Patient Name: {{ $patientName }}</p>

    <p>Doctor Name: {{ $doctorName }}</p>
    <p>Doctor ID: {{ $doctorID }}</p> --}}

    <h1 class=titles>Make Appointment</h1>
    <h3 class=lesser-elements>Doctor On-Duty: {{ $doctorName }}</h3>
    <h3 class=lesser-elements>Date Scheduled: {{ $data['date'] }}</h3>
    <h3 class=lesser-elements>For: {{ $patientName }}</h3>
    <form action=/api/appointment/new method=post>
        @csrf
        <input type=hidden name=userID_Doctor value={{ $doctorID }}>
        <input type=hidden name=date value={{ $data['date'] }}>
        <input type=hidden name=userID_Patient value={{ $data['userID_Patient'] }}>

        <div class=back-button><button type=submit class=prescription-button>Make Appointment</button></div>
        
    </form>

    <?php } ?>

    

@endsection