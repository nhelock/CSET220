{{-- <html>
    <head>
        <title>Register Today</title>
        <link rel="stylesheet" href="/CSS/register.css">
    </head>
    <body> --}}

    @extends('layouts.app')

    @section('title', 'Register')

    @section('content')
        <link rel="stylesheet" href="/CSS/register.css">
        <div class=container>
            <div class='title-holder'>
                <h1>Register</h1>
            </div>
        </div>

        <div class='register-box'>
            <form method='POST' action='/api/registerUser'>
                @csrf
                <div class='input-holder'>
                    <label for='roleID'>Role: </label>
                    <select id='roleID' name='roleID' onchange=togglePatientFields()>
                        <?php
                            foreach($inputs as $option){
                                if($option->roleName == 'patient'){
                        ?>
                        <option value="{{ $option->roleID }}" selected='selected'>{{ $option->roleName }}</option>  
                        <?php
                                }
                            else{

                        ?>
                        <option value="{{ $option->roleID }}">{{ $option->roleName }}</option>
                        <?php
                                }}
                        ?>
                    </select><br>
        </div>

                <div class='input-holder'>
                    <label for='firstName'>First Name: </label>
                    <input type='text' name='firstName' placeholder='First Name'><br>
                </div>
                <div class='input-holder'>
                    <label for='lastName'>Last Name: </label>
                    <input type='text' name='lastName' placeholder='Last Name'><br>
                </div>
                <div class='input-holder'>
                    <label for='email'>Email: </label>
                    <input type=email name=email placeholder='Email Address'>
                    <?php
                        if(isset($data)){
                    ?>
                        <p>Email is in use</p>
                    <?php
                        }
                    ?>
                    <br>
                </div>
                <div class='input-holder'>
                    <label for='phoneNumber'>Phone Number: </label>
                    <input type='tel' name='phoneNumber' placeholder='Phone Number'><br>
                </div>

                <div class='input-holder'>
                    <label for='password'>Password: </label>
                    <input type='password' name='password' placeholder='Password'><br>
                </div>

                <div class='input-holder'>
                    <label for='DOB'>Date of Birth:</label>
                    <input type='date' name='DOB' placeholder='Date of Birth'><br>
                </div>

                <div id=patients>
                    <p>Patient-Exclusive Fields</p>
                    <div class=input-holder>
                        <label for='familyCode'>Family Code: </label>
                        <input type='text' name='familyCode' placeholder='Make your Family Code'><br>
                    </div>

                    <div class=input-holder>
                        <label for='emergencyContact'>Emergency Contact: </label>
                        <input type='text' name='emergencyContact' placeholder='Emergency Contact #'><br>
                    </div>

                    <div class=input-holder>
                        <label for='relation'>Contact Relation:</label>
                        <input type='text' name='relation' placeholder='Relation to Patient'><br>
                    </div>
                </div>

                <div class=submit-holder>
                    <button type=submit class='submit'>Register</button>
                </div>


            </form>
        </div>
    {{-- </body> --}}
    <script>
        function togglePatientFields() {
            const role = document.getElementById('roleID').value;
            const patientFields = document.getElementById('patients');
            if (role == 5) {
                patientFields.style.display = 'block';
            } else {
                patientFields.style.display = 'none';
            }
        }
    </script>
    @endsection
{{-- </html> --}}


