@extends('layouts.app')
    @section('title', 'Paitents Page')

    @section('content')
     
    <link rel="stylesheet" href="{{ asset('CSS/patientsList.css') }}">

        <div class="heading">
        <h1>
            Patient Info
        </h1>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Emergency Contact Relation</th>
                <th>Emergency Contact Number</th>
                <th>Admission Date</th>
            </tr>
            </thead>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->ID }}</td>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ $patient->DOB }}</td>
                <td>{{ $patient->relation }}</td>
                <td>{{ $patient->EmergencyContactNumber }}</td>
                <td>{{ $patient->AdmissionDate }}</td>
            </tr>
            @endforeach
        </table>
        <form class="search_by" action="{{ route('patients.searchPatByID') }}" method="GET">
            <input type="text" placeholder="Search By ID" name="search" required>
            <button type="submit">Submit</button>
        </form>
        <form class="search_by" action="{{ route('patients.searchPatByLastName') }}" method="GET">
            <input type="text" placeholder="Search By Last Name" name="lastName">
            <button type="submit">Submit</button>
        </form>

        {{-- Fixed your DB connection :uwucat: --}}
        <form class="search_by" action ="{{ route('patients.searchPatByCon') }}" method="GET">
            <input type="text" placeholder="Search By Emergency Contact Number" name="eContact">
            <button type="submit">Submit</button>
        </form>

        <form class="search_by" action="{{ route('patients.searchPatByDate') }}" method="GET">
            <input type="text" placeholder="Search By Admission Date" name="date">
            <button type="submit">Submit</button>
        </form>
@endsection