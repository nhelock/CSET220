<html>
    <head>
        <title>
            Caregivers Home
        </title>
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
    </head>
    <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#Other">Other</a></li>
                <li><a href="#Other">Other</a></li>
            </ul>
    </nav>
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
                <form id="form">
                    @foreach ( $patients as $patient )
                        <tr>
                            <td>{{ $patients->first_name }} {{ $patients->last_name }}<input type="checkbox" id="done1" name="done1" value="done1"></td>
                                <label for="done1"></label></td>
                            <td>{{ $patients->morningMed}} <input type="checkbox" id="done2" name="done2" value="done2">
                                <label for="done2"></label></td>
                            <td>{{ $patients->afternoonMed }} <input type="checkbox" id="done3" name="done3" value="done3">
                                <label for="done3"></label></td>
                            <td>{{ $patients->nightMed }} <input type="checkbox" id="done4" name="done4" value="done4">
                                <label for="done4"></label></td>
                            <td>{{ $patients->breakfast }} <input type="checkbox" id="done5" name="done5" value="done5">
                                <label for="done5"></label></td>
                            <td>{{ $patients->lunch }} <input type="checkbox" id="done6" name="done6" value="done6">
                                <label for="done6"></label></td>
                            <td>{{ $patients->dinner }} <input type="checkbox" id="done6" name="done6" value="done6">
                                <label for="done6"></label></td>
                            <td>
                                <button type="submit" class="button" form="form">Ok</button>
                                <button type="reset" class="c-button" form="form">Cancel</button>
                            </td>  
                        </tr>
                    @endforeach
                </form>
                
            </tbody>
        </table>
    </body>
    <script src="script.js"></script>
</html>