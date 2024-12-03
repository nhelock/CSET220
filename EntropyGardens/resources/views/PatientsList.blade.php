<html>
    <head>
        <title>
            Patients Page
        </title>
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
            Patient Info
        </h1>
        </div>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Emergency Contact</th>
                <th>Emergency Contact Name</th>
                <th>Admission Date</th>
            </tr>
            </thead>
            <tr>
                <td>1000</td>
                <td>Jim JIm</td>
                <td>22</td>
                <td>Dad</td>
                <td>Guy</td>
                <td>12/12/12</td>
            </tr>
        </table>
        <form class="search_by" action="action_page.php">
            <input type="text" placeholder="Search By ID" name="search">
            <button type="submit">Submit</button>
            <input type="text" placeholder="Search By Name" name="search">
            <button type="submit">Submit</button>
            <input type="text" placeholder="Search By Emergency Contact Name" name="search">
            <button type="submit">Submit</button>
            <input type="text" placeholder="Search By Admission Date" name="search">
            <button type="submit">Submit</button>
          </form>
    </body>
</html>