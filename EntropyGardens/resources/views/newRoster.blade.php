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
      <form method="POST" action="{{ route('rosters.store') }}">
        @csrf
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required />
        </div>
    
        <div class="form-group">
            <label for="doctor">Doctor</label>
            <select id="doctor" name="userID_Doctor" required>
                <option value="">Select Doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->userID }}">{{ $doctor->firstName }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="caregiver1">Caregiver 1</label>
            <select id="caregiver1" name="userID_CG1" required>
                <option value="">Select Caregiver</option>
                @foreach ($caregivers as $caregiver)
                    <option value="{{ $caregiver->userID }}">{{ $caregiver->firstName }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="caregiver2">Caregiver 2</label>
            <select id="caregiver2" name="userID_CG2" required>
                <option value="">Select Caregiver</option>
                @foreach ($caregivers as $caregiver)
                    <option value="{{ $caregiver->userID }}">{{ $caregiver->firstName }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="caregiver3">Caregiver 3</label>
            <select id="caregiver3" name="userID_CG3" required>
                <option value="">Select Caregiver</option>
                @foreach ($caregivers as $caregiver)
                    <option value="{{ $caregiver->userID }}">{{ $caregiver->firstName }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="caregiver4">Caregiver 4</label>
            <select id="caregiver4" name="userID_CG4" required>
                <option value="">Select Caregiver</option>
                @foreach ($caregivers as $caregiver)
                    <option value="{{ $caregiver->userID }}">{{ $caregiver->firstName }}</option>
                @endforeach
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
