<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Roster</title>
    <link rel="stylesheet" href="/CSS/newRoster.css" />
  </head>
  <body>
    <div class="container">
      <h2>New Roster</h2>
      <form>
        <div class="form-group">
          <label for="date">Date</label>
          <input type="date" id="date" />
        </div>

        <div class="form-group">
          <label for="supervisor">Supervisor</label>
          <select id="supervisor">
            <option value="">Select Supervisor</option>
          </select>
        </div>

        <div class="form-group">
          <label for="doctor">Doctor</label>
          <select id="doctor">
            <option value="">Select Doctor</option>
          </select>
        </div>

        <div class="form-group">
          <label for="caregiver1">Caregiver 1</label>
          <select id="caregiver1">
            <option value="">Select Caregiver</option>
          </select>
        </div>

        <div class="form-group">
          <label for="caregiver2">Caregiver 2</label>
          <select id="caregiver2">
            <option value="">Select Caregiver</option>
          </select>
        </div>

        <div class="form-group">
          <label for="caregiver3">Caregiver 3</label>
          <select id="caregiver3">
            <option value="">Select Caregiver</option>
          </select>
        </div>

        <div class="form-group">
          <label for="caregiver4">Caregiver 4</label>
          <select id="caregiver4">
            <option value="">Select Caregiver</option>
          </select>
        </div>
        <div class="buttons">
          <button type="submit" class="btn ok-btn">Ok</button>
          <button type="button" class="btn cancel-btn">Cancel</button>
        </div>
      </form>
    </div>
  </body>
</html>
