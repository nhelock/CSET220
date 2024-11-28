<html>
    <head>
        <title>
            Employee Page
        </title>
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
    width: 100;
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
  
form.update_salary {
    width: 30%;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

form.update_salary input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}
  
form.update_salary button {
    float: left;
    width: 100;
    padding: 10px;
    background: #3b429f;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}
  
form.update_salary button:hover {
    background: #aa7dce;
}


        </style>
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
            
        <form class="search_by" action="{{ route('employee.search') }}" method="GET">
            @csrf
            <label for="search">Search By ID:</label>
            <input type="text" id="search" name="search" placeholder="Enter Employee ID">
            <button type="submit">Search</button>
        </form>

        <form class="update_salary" action="/api/employees/update-salary" method="POST">
            {{-- action="{{ route('employee.updateSalary') }}" --}}
            @csrf
            <label for="employee_id">Employee ID:</label>
            <input type="text" id="employee_id" name="employee_id" placeholder="Enter Employee ID" required>
            <label for="new_salary">New Salary:</label>
            <input type="text" id="new_salary" name="new_salary" placeholder="Enter New Salary" required>
            <button type="submit">Update Salary</button>
        </form>

        </div>
    </div>
    </body>
    <script src="script.js"></script>
</html>