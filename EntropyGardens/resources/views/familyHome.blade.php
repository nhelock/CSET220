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
          {{-- <button>Cancel</button> --}}
        </div>
      </form>
      <div class="schedule-container">
        <div>Doctor's Name</div>
        <div>Doctor's Appointment</div>
        <div>Caregiver's Name</div>
        <div>Morning Medicine</div>
        <div class="checkbox-container">
          <input
            type="checkbox"
            id="afternoon-medicine"
            name="afternoon-medicine"
          />
          <label for="afternoon-medicine">Afternoon Medicine</label>
        </div>
        <div class="checkbox-container">
          <input type="checkbox" id="night-medicine" name="night-medicine" />
          <label for="night-medicine">Night Medicine</label>
        </div>
        <div class="checkbox-container">
          <input type="checkbox" id="breakfast" name="breakfast" />
          <label for="breakfast">Breakfast</label>
        </div>
        <div class="checkbox-container">
          <input type="checkbox" id="lunch" name="lunch" />
          <label for="lunch">Lunch</label>
        </div>
        <div class="checkbox-container">
          <input type="checkbox" id="dinner" name="dinner" />
          <label for="dinner">Dinner</label>
        </div>
      </div>
    </div>
  </body>
</html>
