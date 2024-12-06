<html>
<head>
    <title>Patient's Home</title>
    <style>
        body {
            display: block;
            background-color: #AA7DCE;
        }
        .date {
            padding: 1%;
            border: 2px solid #3b429f;
            border-radius: 0px 20px;
            background-color: #3b429f;
            
        }
        .form_fields {
            color: #f5d7e3;
            display: flex;
            gap: 18%;
        }
        .id {
            padding: 1%;
            border: 2px solid #3b429f;
            border-radius: 0px 20px;
            background-color: #3b429f;
        }
        .name {
            padding: 1%;
            border: 2px solid #3b429f;
            border-radius: 0px 20px;
            background-color: #3b429f;
        }
        .new {
            display: flex;
            justify-content: center;
        }
        th {
            color: #f4a5ae;
            padding: 10px;
            background-color: #a85573;
        }
    </style>
</head>
<body>
    <h1>Patient's Home</h1>
    <form action="/patients_home" method="POST">
    <div class="form_fields">
        <p class="id">Patient ID <input value=""></p>
        <p class="date">Date <input type="date" value="{{ $date }}"></p>
        <p class="name">Patient Name <input type="text"></p>
    </div>
    <div class="new">
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
        </table>
    </div>
    </form>
</body>
</html>