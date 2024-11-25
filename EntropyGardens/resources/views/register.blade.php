<html>
    <head>
        <title>Register Today</title>
        <style></style>
    </head>
    <body>
        <h1>Register</h1>

        <form method='POST' action='/api/register'>
            @csrf
            <label for='roleID'>Role: </label>
            <input type='number' name='roleID' placeholder='Role'><br>

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

            <button type=submit>Register</button>


        </form>
    </body>
</html>


