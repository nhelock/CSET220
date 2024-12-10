

    @extends('layouts.app')
    @section('title', 'Caregiver Home')
        
    @section('content')
    <link rel="stylesheet" href="{{ asset('CSS/caregiverHome.css') }}">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

td .button :hover{
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

td .done1 {
    background-color: #3b429f;
}

.checkmark {
    background-color: #3b429f;
}
    </style>
        
    <body>
        <div class="heading">
        <h1>
            Cargivers Home
        </h1>
        </div>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Morning Med</th>
                <th>Afternoon Med</th>
                <th>Night Med</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
                <th>Confirm</th>
            </tr>
            </thead>
            <tbody>
                @if($patients->isEmpty())
                    <p>No patients scheduled for today.</p>
                @else
                @foreach ($patients as $patient)
                    <form id="form" action="{{ route('CaregiverH.submit') }}" method="POST">
                        @csrf
                        <tr>
                            <tr>
                                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>

                                <input type="hidden" name="patients[{{ $patient->userID }}][morningMed]" value="0">
                                <td>
                                    <input type="checkbox" name="patients[{{ $patient->userID }}][morningMed]" value="1" {{ $patient->morningMed ? 'checked' : '' }}>
                                </td>
                                
                                <input type="hidden" name="patients[{{ $patient->userID }}][afternoonMed]" value="0">
                                <td>
                                    <input type="checkbox" name="patients[{{ $patient->userID }}][afternoonMed]" value="1" {{ $patient->afternoonMed ? 'checked' : '' }}>
                                </td>
            
                                <input type="hidden" name="patients[{{ $patient->userID }}][nightMed]" value="0">
                                <td>
                                    <input type="checkbox" name="patients[{{ $patient->userID }}][nightMed]" value="1" {{ $patient->nightMed ? 'checked' : '' }}>
                                </td>
            
                                <input type="hidden" name="patients[{{ $patient->userID }}][breakfast]" value="0">
                                <td>
                                    <input type="checkbox" name="patients[{{ $patient->userID }}][breakfast]" value="0" {{ $patient->breakfast ? 'checked' : '' }}>
                                </td>
            
                                <input type="hidden" name="patients[{{ $patient->userID }}][lunch]" value="0">
                                <td>
                                    <input type="checkbox" name="patients[{{ $patient->userID }}][lunch]" value="1" {{ $patient->lunch ? 'checked' : '' }}>
                                </td>
            
                                <input type="hidden" name="patients[{{ $patient->userID }}][dinner]" value="0">
                                <td>
                                    <input type="checkbox" name="patients[{{ $patient->userID }}][dinner]" value="1" {{ $patient->dinner ? 'checked' : '' }}>
                                </td>
                            <td>
                                <button type="submit" class="button">Ok</button>
                            </td>
                        </tr>
                    </form>
                    @endforeach
                
            </tbody>
        </table>
        @endif
    </body>
    <script src="script.js"></script>
@endsection