@extends('layouts.app')

@section('title', 'Rosters')

@section('content')
<link rel=stylesheet href='CSS/homepage.css'>
    <h1>Rosters</h1>

    <h3>Search for Roster by Date:</h3>
    <form action='/roster' method=POST>
        @csrf
        <input type="date" name='date' required>
        <button type=submit>Search</button>
    </form>

    <?php if(isset($data)){ ?>

        <table>
            <tr>
                <th>Supervisor</th>
                <th>Doctor</th>
                <th>Caregiver 1</th>
                <th>Caregiver 2</th>
                <th>Caregiver 3</th>
                <th>Caregiver 4</th>
            </tr>
            <tr>
                {{-- Temporary Value, change later --}}
                <td>Amy Powers</td>
                <td>{{ $data['doctor'] }}</td>
                <td>{{ $data['cg_1'] }}</td>
                <td>{{ $data['cg_2'] }}</td>
                <td>{{ $data['cg_3'] }}</td>
                <td>{{ $data['cg_4'] }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Group Alpha</td>
                <td>Group Bravo</td>
                <td>Group Charlie</td>
                <td>Group Delta</td>
            </tr>
            
            
        </table>

    <?php } ?>
    

@endsection