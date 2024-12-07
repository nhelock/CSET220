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
            <p class="id">Patient ID <input value="{{ $userID_Patient }}"></p>
            <p class="date">Date <input type="date" value="{{ $date }}"></p>
            <p class="name">Patient Name <input type="text" value="{{ $firstName }} {{ $lastName }}"></p>
        </div>
        <div class="new">
            <table>
                <tr>
                    <th>Caregiver's Name</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Night Medicine</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Dinner</th>
                </tr>
                @foreach($data as $d)
                <tr>
                    <td>{{ $d->firstName }} {{ $d->lastName }}</td>
                    <td>{{ $d->morningMed }}</td>
                    <td>{{ $d->afternoonMed }}</td>
                    <td>{{ $d->nightMed }}</td>
                    <td>{{ $d->breakfast }}</td>
                    <td>{{ $d->lunch }}</td>
                    <td>{{ $d->dinner }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </form>
</body>
</html>
