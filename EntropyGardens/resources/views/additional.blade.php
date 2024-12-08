@extends('layouts.app')

@section('title', 'Additional Information')

@section('content')
   <link rel=stylesheet href='CSS/additional.css'>
    <div>
        <div class="heading">
        <h1>
            Additional Infomation of Patient 
        </h1>
        </div>


        <div class='form-container'>
            <form class="search_by" action='/additional/search/id' method="GET">
                @csrf
                <label for="search">Search By ID:</label>
                <input type="text" id="search" name="search" placeholder="ID">
                <input type="hidden" name="search_by" value="userID">
                <button type="submit">Search</button>
            </form>
        </div>
        <?php 
        if(isset($patientFound)){
        ?>
        <div class="results">
            <div class='heading'>
                <h1>Found User</h1>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                          <th>Patient ID</th>
                          <th>Name</th>
                          
                          <th>Group</th>
                          <th>Admission Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($patientFound as $patientFounds)
                      <tr>
                          <td>{{$patientFounds->id}}</td>
                          <td>{{$patientFounds->first_name}} {{$patientFounds->last_name}}</td>
                          
                          <td>{{$patientFounds->groups}}</td>
                          <td>{{$patientFounds->admission_date}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <script src="script.js"></script>
@endsection
