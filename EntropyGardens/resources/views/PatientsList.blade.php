@extends('layouts.app')
    @section('title', 'Paitents Page')

    @section('content')
        <style>
            
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* FORM */
form.search_by input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}
  
form.search_by button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #3b429f;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}
  
form.search_by button:hover {
    background: #aa7dce;
}
  
form.seacrh_by::after {
    content: "";
    clear: both;
    display: table;
}

form{
    width: 100%;
}

/* TABLE*/
tr:hover {background-color: #F5D7E3;}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

form.search_by {
    padding-top: 20px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

thead{
    background-color: #F5D7E3;
}


/* NAV BAR */
nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #a8577e;
    position: -webkit-sticky;
    position: sticky;
    top: 0;
}
  
nav li {
    float: left;
}
  
nav li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
  
nav li a:hover {
    background-color: #783d59;
}

.heading h1 {
    text-align: center;
    padding-top: 30px;
    padding-bottom: 25px;
}
        </style>
    </head>
    <body>
        <div class="heading">
        <h1>
            Patient Info
        </h1>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Emergency Contact Relation</th>
                <th>Emergency Contact Number</th>
                <th>Admission Date</th>
            </tr>
            </thead>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->ID }}</td>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ $patient->DOB }}</td>
                <td>{{ $patient->relation }}</td>
                <td>{{ $patient->EmergencyContactNumber }}</td>
                <td>{{ $patient->AdmissionDate }}</td>
            </tr>
            @endforeach
        </table>
        <form class="search_by" action="{{ route('patients.searchPatByID') }}" method="GET">
            <input type="text" placeholder="Search By ID" name="search" required>
            <button type="submit">Submit</button>
        </form>
        <form class="search_by" action="{{ route('patients.searchPatByLastName') }}" method="GET">
            <input type="text" placeholder="Search By Last Name" name="lastName">
            <button type="submit">Submit</button>
        </form>

        {{-- still needs db connection --}}
        <form class="search_by" method="GET">
            <input type="text" placeholder="Search By Emergency Contact Number" name="eContact">
            <button type="submit">Submit</button>
        </form>

        <form class="search_by" action="{{ route('patients.searchPatByDate') }}" method="GET">
            <input type="text" placeholder="Search By Admission Date" name="date">
            <button type="submit">Submit</button>
        </form>
    </body>
@endsection