@extends('layouts.app')

@section('title', 'Patient Home')

@section('content')
    <link rel=stylesheet href={{ asset('/CSS/patientOfDoctor.css') }}>
    <?php if(!isset($data)){ ?>

    <h3 class=titles>Search for Patient by ID: </h3>
    <form method=POST action='/doctor/patients/search'>
        @csrf
        <table class=new-prescription>
            <tr>
                <td><label for=userID>Patient's ID: </label></td>
                <td><input type=number name=userID placeholder="Patient ID"></td>
                <td><button type=submit class=prescription-button>Search</button></td>
            </tr>
        </table>
        

        
    </form>

    <?php } ?>

    <?php if(isset($prescription)){ ?>
    <h3 class=titles>Prescription:</h3>
    <table class=prescription>
        <tr>
            <th>Date Assigned</th>
            <th>Comment</th>
            <th>Morning Med</th>
            <th>Afternoon Med</th>
            <th>Night Med</th>
        </tr>
        <tr>
            <td>{{ $prescription->date }}</td>
            <td>{{ $prescription->comment }}</td>
            <td>{{ $prescription->morningMed }}</td>
            <td>{{ $prescription->afternoonMed }}</td>
            <td>{{ $prescription->nightMed }}</td>
        </tr>
    </table>
    <?php } ?>

    <?php if(isset($appointment)){ ?>

    <h3 class=titles>Appointment's New Prescription:</h3>
    <form action='/api/doctor/patient/update' method=POST>
        <input type=hidden name=userID value={{ $userID }}>

        <table class=new-prescription>
            <tr>
                <td><label for=comment>Comment: </label></td>
                <td><input type=text name=comment placeholder=comment></td>
            </tr>
            <tr>
                <td><label for=morningMed>Morning Medication: </label></td>
                <td><input type=text name=morningMed placeholder="Morning Medication"></td>
            </tr>
            <tr>
                <td><label for=afternoonMed>Afternoon Medication: </label></td>
                <td><input type=text name=afternoonMed placeholder="Afternoon Medication"></td>
            </tr>
            <tr>
                <td><label for=nightMed>Night Medication: </label></td>
                <td><input type=text name=nightMed placeholder="Night Medication"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type=submit class=prescription-button>Update Prescription</button></td>
            </tr>
        </table>
        
        
    </form>

    <a class=cancel-button href=/doctor/patients>Go Back</a>
    
    <?php } ?>

@endsection