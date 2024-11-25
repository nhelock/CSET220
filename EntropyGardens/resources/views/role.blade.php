<html>
<head>
    <title>Role</title>
    <style>
        body {
            background-color: #AA7DCE;
            color: #f5d7e3;
            text-align: center;
        }
        .info {
            padding-top: 12%;
        }
        .buttons {
            text-align: center;
        }
        .button1, .button2 {
            background-color: #a85573;
            border-radius: 10px;
            box-shadow: none;
            padding: 10px 20px;
            color: #f5d7e3;
            margin: 5px;
            display: inline-block;
        }
        .button1 a, .button2 a {
            color: #f5d7e3;
            text-decoration: none;
            display: block;
        }
        .button1:hover, .button2:hover {
            background-color: #f4a5ae;
        }
        .tables {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .box1 {
            width: 40%;
            background-color: #a85573;
            border-radius: 10px;
            padding: 20px;
        }
        .box2 {
            width: 40%;
            background-color: #a85573;
            border-radius: 10px;
            padding: 20px;
        }
        .new, .access {
            background-color: #3b429f;
            color: #f5d7e3;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            display: inline-block;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Role</h1>
    <table class="tables">
        <th class="box1">New Role</th>
        <th class="box2">Access Level</th>
    </table>
    <div class="info">
        <p class="new">New Role<input type="text" name="New"></p>
        <p class="access">Access Level<input type="text" name="Access"></p> 
    </div>
    <div class="buttons">
        <button class="button1"><a href="">Ok</a></button>
        <button class="button2"><a href="">Cancel</a></button>
    </div>
</body>
</html>
