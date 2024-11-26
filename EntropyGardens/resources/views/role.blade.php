<?php


?>
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
        <tr>
            <th class="box1">Role</th>
            <th class="box2">Access Level</th>
        </tr>
            @foreach ($roles as $r)
                <tr>
                    <td>{{ $r->roleName }}</td>
                    <td>{{ $r->accesslevel }}</td>
                </tr>

                
            @endforeach
    </table>
    <div class="info">
        <form action="/api/role" method="POST">
        <p class="new">Role Name<input type="text" name="roleName"></p>
        <p class="access">Access Level<input type="text" name="accessLevel"></p>
        <div class="buttons">
            <button class="button1" type="submit">Ok</button>
            <button class="button2" type="reset">Cancel</button>
        </div>
        </form>
    </div>
</body>
</html>
