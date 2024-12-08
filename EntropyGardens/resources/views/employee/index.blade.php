@extends('layouts.app')

@section('title', 'Employee Page')

@section('content')
    <link rel=stylesheet href={{ asset('CSS/employees.css') }}>
    <div>
        <div class="heading">
        <h1>
            Employees
        </h1>
        </div>
        <div class="table-form-container">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->role }}</td>
                            <td>{{ $employee->salary }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
            <form class="update_salary" action="/api/employees/update-salary" method="POST">
                @csrf
                <label for="employee_id">Employee ID:</label>
                <input type="text" id="employee_id" name="employee_id" placeholder="Enter Employee ID" required>
                <label for="new_salary">New Salary:</label>
                <input type="text" id="new_salary" name="new_salary" placeholder="Enter New Salary" required>
                <button type="submit">Update Salary</button>
            </form>

        </div>

        <div class='form-container'>
            <form class="search_by" action='/api/employees/search/id' method="GET">
                @csrf
                <label for="search">Search By ID:</label>
                <input type="text" id="search" name="search" placeholder="ID">
                <input type="hidden" name="search_by" value="userID">
                <button type="submit">Search</button>
            </form>

            <form class="search_by" action='/api/employees/search/name' method="GET">
                @csrf
                <label for="search">Search By Last Name:</label>
                <input type="text" id="search" name="search" placeholder="Name">
                <input type="hidden" name="search_by" value="lastName">
                <button type="submit">Search</button>
            </form>

            <form class="search_by" action='/api/employees/search/role' method="GET">
                @csrf
                <label for="search">Search By Role:</label>
                <input type="text" id="search" name="search" placeholder="Role">
                <input type="hidden" name="search_by" value="roleName">
                <button type="submit">Search</button>
            </form>
       

            <form class="search_by" action='/api/employees/search/salary' method="GET">
                @csrf
                <label for="search">Search By Salary:</label>
                <input type="text" id="search" name="search" placeholder="Salary">
                <input type="hidden" name="search_by" value="salary">
                <button type="submit">Search</button>
            </form>
        </div>

        <?php      
            if(isset($foundUsers)){        
        ?>
        <div class="results">
            <div class='heading'>
                <h1>Found User</h1>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($foundUsers as $foundUser)
                        <tr>
                            <td>{{ $foundUser->id }}</td>
                            <td>{{ $foundUser->first_name }} {{ $foundUser->last_name }}</td>
                            <td>{{ $foundUser->role }}</td>
                            <td>{{ $foundUser->salary }}</td>
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
