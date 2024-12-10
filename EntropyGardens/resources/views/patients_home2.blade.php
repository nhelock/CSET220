@extends('layouts.app')

@section('title', 'Patient Home')

@section('content')
    <link rel=stylesheet href={{ asset('CSS/familyHome.css') }}>
    <h1>UserID: {{ $userID }}</h1>
    <h1>Name: {{ $name }}</h1>
    <h1>Date: {{ $date }}</h1>

    <form action=/patient method=POST>
        @csrf
        <label for=date>Search for Itinerary by Date: </label>
        <input type=date name=date placeholder={{ $date }} value={{ $date }}>
        <button type=submit>Search</button>
    </form>

    <?php if(isset($data)){ ?>

        <div class="schedule-container">
          <table>
              <tr>
                <th>Doctor's Name</th>
                <th>Doctor's Appointment</th>
                <th>Caregiver's Name</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
              </tr>
              
              <tr>
                <th>{{ $data['doctorName'] }}</th>
                <th>{{ $data['doctorAppointment'] }}</th>
                <th>{{ $data['caregiverName'] }}</th>
                <th>{{ $data['morningMedicine'] == 1 ? 'Yes' : 'No'  }}</th>
                <th>{{ $data['afternoonMedicine'] == 1 ? 'Yes' : 'No'  }}</th>
                <th>{{ $data['nightMedicine'] == 1 ? 'Yes' : 'No'  }}</th>
                <th>{{ $data['breakfast'] == 1 ? 'Yes' : 'No'  }}</th>
                <th>{{ $data['lunch'] == 1 ? 'Yes' : 'No'  }}</th>
                <th>{{ $data['dinner'] == 1 ? 'Yes' : 'No'  }}</th>
              </tr>
  
              <?php } ?>
          </table> 
        </div>

@endsection