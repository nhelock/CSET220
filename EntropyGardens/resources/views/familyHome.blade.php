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
      <h1 class=found-title>Patient Found!  Search Schedule by Date:</h1>
      <h3 class=found-title>Enter a Date:</h3>

      <form action='/family/search' method=POST>
        @csrf
        <table class=date-search-table>
          <tr>
            <th><label for=date>Date:</label></th>
            <th><input type=date name=date required></th>
            <input type=hidden name=userID value={{ $code_form }}>
            <input type=hidden name=userID value={{ $code_form }}>
          </tr>
          <tr>
            <th></th>
            <th><button class=search type=submit>Search</button></th>
          </tr>
        </table>
        
        
      </form>

      <?php } if(isset($data)){ ?>

      
        <table class=found-data-table>
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
              <td>{{ $data['doctorName'] }}</td>
              <td>{{ $data['doctorAppointment'] }}</td>
              <td>{{ $data['caregiverName'] }}</td>
              <td>{{ $data['morningMedicine'] == 1 ? 'Yes' : 'No'  }}</td>
              <td>{{ $data['afternoonMedicine'] == 1 ? 'Yes' : 'No'  }}</td>
              <td>{{ $data['nightMedicine'] == 1 ? 'Yes' : 'No'  }}</td>
              <td>{{ $data['breakfast'] == 1 ? 'Yes' : 'No'  }}</td>
              <td>{{ $data['lunch'] == 1 ? 'Yes' : 'No'  }}</td>
              <td>{{ $data['dinner'] == 1 ? 'Yes' : 'No'  }}</td>
            </tr>

            <?php } ?>
        </table> 
      

    </div>
@endsection
