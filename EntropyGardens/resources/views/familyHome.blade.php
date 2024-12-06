<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Family Member's Home</title>
    <link rel="stylesheet" href="/CSS/familyHome.css">
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1>Family Member's Home</h1>
      </div>
      <p class="header-sub">
        Search Patients by entering the Patient ID and Family Code
      </p>
      <form action='/family' method=POST>
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
            <input type="text" id="patient-id" name="userID" />
          </div>
        </div>
        <div class="button-container">
          <button type=submit>Ok</button>
        </div>
      </form>
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
            <?php if(isset($data)){ ?>
            
            <tr>
              <th>{{ $data->doctorName }}</th>
              <th>{{ $data->doctorAppointment }}</th>
              <th>{{ $data->caregiverName }}</th>
              <th>{{ $data->morningMedicine }}</th>
              <th>{{ $data->afternoonMedicine }}</th>
              <th>{{ $data->nightMedicine }}</th>
              <th>{{ $data->breakfast }}</th>
              <th>{{ $data->lunch }}</th>
              <th>{{ $data->dinner }}</th>
            </tr>

            <?php } ?>
        </table> 
      </div>

    </div>
  </body>
</html>
