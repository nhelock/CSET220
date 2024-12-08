@extends('layouts.app')

@section('title', 'Family Member\'s Home')

@section('content')
    <link rel="stylesheet" href={{ asset("/CSS/familyHome.css") }}>
    <div class="container">
      <div class="header">
        <h1>Family Member's Home</h1>
      </div>
      <p class="header-sub">
        Search Patients by entering the Patient ID and Family Code
      </p>
      <form action='/family' method=POST>
        @csrf
        <div class="form-container">
          <div>
            <label for="family-code"
              >Family code (For Patient Family Member):</label
            >
            <input type="text" id="family-code" name="familyCode" />
          </div>
          <div>
            <label for="patient-id"
              >Patient ID (For Patient Family Member):</label
            >
            <input type="number" id="patient-id" name="userID" />
          </div>
        </div>
        <div class="button-container">
          <button type=submit>Ok</button>
        </div>
      </form>

      <?php if(isset($code_form)){ ?>
      <h1>Patient Found!  Search Schedule by Date:</h1>
      <h3>Enter a Date:</h3>

      <form action='/family/search' method=POST>
        @csrf
        <label for=date>Date:</label>
        <input type=date name=date required>
        <input type=hidden name=userID value={{ $code_form }}>
        <button type=submit>Search</button>
      </form>

      <?php } if(isset($data)){ ?>

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

    </div>
@endsection
