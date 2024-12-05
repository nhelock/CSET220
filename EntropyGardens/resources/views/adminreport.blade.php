<html>
    <head>
        <title>
            Admin Report
        </title>
        <link rel="stylesheet" href="style.css">
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
            Missed Activity
        </h1>
        </div>
        <div class="table-form-container">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Patient's Name</th>
                            <th>Doctor's Name</th>
                            <th>Caregiver's Name</th>
                            <th>Morning Med</th>
                            <th>Afternoon Med</th>
                            <th>Night Med</th>
                            <th>Breakast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jim</td>
                            <td>Ahmi</td>
                            <td>George</td>
                            <td>Med1</td>
                            <td>Med2</td>
                            <td>Med3</td>
                            <td>Breakast</td>
                            <td>Lunch</td>
                            <td>Dinner</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <form class="search_by" action="action_page.php">
                <input type="text" placeholder="Enter Date in YY/MM/DD Format" name="search">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    </body>
    <script src="script.js"></script>
</html>