{{-- <html>
    <head>
        <title>
            Doctor Home
        </title> --}}
    @extends('layouts.app')
    @section('title', 'Doctors Home')

    @section('content')
        <style>
            
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* TABLE*/

.table-form-container {
    display: flex;
    align-items: flex-start;
}

.table-container {
    width: 70%;
}



tr:hover {background-color: #F5D7E3;}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
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

/* BUTTONS */



td .button{
    width:fit-content;
    padding: 5px;
    background: #3b429f;
    color: white;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
    border: none;
    text-align: center;
    overflow: visible;

}

.button :hover{
    background: #aa7dce;
}

td .c-button{
    width:fit-content;
    padding: 5px;
    background: #3b429f;
    color: white;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
    border: none;
    text-align: center;
    overflow: visible;
}

/* FORM */
form.search_by {
    width: 30%;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

form.search_by input[type=text][type=date] {
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


        </style>
    {{-- </head> --}}
    <div>
        <div class="heading">
        <h1>
            Doctor Home
        </h1>
        </div>
        <div class="table-form-container">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Comment</th>
                            <th>Morning Med</th>
                            <th>Afternoon Med</th>
                            <th>Night Med</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                            <td>{{ $patient->date }}</td>
                            <td>{{ $patient->comment }}</td>
                            <td>{{ $patient->morningMed }}</td>
                            <td>{{ $patient->afternoonMed }}</td>
                            <td>{{ $patient->nightMed }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form class="search_by" action="{{ 'doctor.search' }}" method="GET">
                <input type="text" placeholder="Search By Last Name" name="search" required>
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="table-form-container">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Paitent</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $patients as $patient )
                            <td>{{ $patients->first_name }} {{ $patients->last_name }}</td>
                            <td>{{ $patients->date }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form class="search_by" action="{{ route('doctor.searchTilDate') }}" id="form2" method="GET">
                <input type="date" placeholder="Search Appointments Til Date" name="til_date" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    
    <script src="script.js"></script>
{{-- </html> --}}
@endsection