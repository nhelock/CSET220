{{-- <html>
    <head>
        <title>
            Admin Report
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#Other">Other</a></li>
                <li><a href="#Other">Other</a></li>
            </ul>
    </nav>
    <div>
        <div class="heading">
        <h1>
            Missed Activity
        </h1>
        </div>
        <div class="table-form-container">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Patient's Name</th>
                            <th>Doctor's Name</th>
                            <th>Caregiver's Name</th>
                            <th>Morning Med</th>
                            <th>Afternoon Med</th>
                            <th>Night Med</th>
                            <th>Breakast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($users as $user)
                            <td>Jim</td>
                            <td>Ahmi</td>
                            <td>George</td>
                            <td>Med1</td>
                            <td>Med2</td>
                            <td>Med3</td>
                            <td>Breakast</td>
                            <td>Lunch</td>
                            <td>Dinner</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form class="search_by" action="action_page.php">
                <input type="text" placeholder="Enter Date in YY/MM/DD Format" name="search">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    </body>
    <script src="script.js"></script>
</html> --}}

@extends('layouts.app')

@section('title', 'Admin Report')

@section('content')

    <link rel=stylesheet href={{ asset('/CSS/patientOfDoctor.css') }}>
    <h1 class=titles>Search By Date: </h1>
    <form action=/report/search method=GET>
        <table class=new-prescription>
            <tr>
                <th><label for=date>Date: </label></th>
                <th><input type=date name=date></th>
            </tr>
            <tr>
                <td></td>
                <td><button type=submit class=prescription-button>Search</button></td>
            </tr>
        </table>
        
        

        
    </form>

    <?php if(isset($entries)){ ?>
        <h1 class=titles>Entries Found:</h1>

        <?php foreach($entries as $entry){ ?>
            <table class=prescription>
                <tr>
                    <th>Patient's Name</th>
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
                    <td>{{ $entry['firstName'] }} {{ $entry['lastName'] }}</td>
                    <td>{{ $entry['doctorName'] }}</td>
                    <td>{{ $entry['appointment'] }}</td>
                    <td>{{ $entry['caregiverName'] }}</td>
                    <td><?php if($entry['morningMed'] == false){ ?>Missed<?php } else { ?>Done<?php } ?></td>
                    <td><?php if($entry['afternoonMed'] == false){ ?>Missed<?php } else { ?>Done<?php } ?></td>
                    <td><?php if($entry['nightMed'] == false){ ?>Missed<?php } else { ?>Done<?php } ?></td>
                    <td><?php if($entry['breakfast'] == false){ ?>Missed<?php } else { ?>Done<?php } ?></td>
                    <td><?php if($entry['lunch'] == false){ ?>Missed<?php } else { ?>Done<?php } ?></td>
                    <td><?php if($entry['dinner'] == false){ ?>Missed<?php } else { ?>Done<?php } ?></td>
                </tr>
            </table>

    <?php }} ?>
@endsection