<html>
    <head>
        <title>Register Today</title>
        <style></style>
    </head>
    <body>
        <h1>Register</h1>

        <form method='POST' action='/api/registerUser'>
            @csrf

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

            <label for='firstName'>First Name: </label>
            <input type='text' name='firstName' placeholder='First Name'><br>

            <label for='lastName'>Last Name: </label>
            <input type='text' name='lastName' placeholder='Last Name'><br>

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

            <label for='phoneNumber'>Phone Number: </label>
            <input type='tel' name='phoneNumber' placeholder='Phone Number'><br>

            <label for='password'>Password: </label>
            <input type='password' name='password' placeholder='Password'><br>

            <label for='DOB'>Date of Birth:</label>
            <input type='date' name='DOB' placeholder='Date of Birth'><br>

            {{-- <div id=patients>
                <p>Patient-Exclusive Fields</p>

                <label for='familyCode'>Family Code: </label>
                <input type='text' name='familyCode' placeholder='Make your Family Code'><br>
            </div> --}}

            <button type=submit>Register</button>


        </form>
    </body>
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
</html>


