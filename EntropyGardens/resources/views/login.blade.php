<html>
    <head>
        <title>Login</title>
        <style>
            body {
                background-color: #AA7DCE;
                color: #f5d7e3;
                text-align: center;
            }
            .info {
                padding-top: 12%;
                text-align: center;
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
                text-align: center;
            }
            .button1:hover, .button2:hover {
                background-color: #f4a5ae;
            }
            .email, .password {
                background-color: #3b429f;
                color: #f5d7e3;
                border-radius: 5px;
                padding: 10px;
                margin-bottom: 10px;
                display: inline-block;
                text-align: left;
            }
            input[type="email"], input[type="password"] {
                font-size: 16px;
                padding: 10px;
                width: 100%;
                border: none;
                border-radius: 5px;
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
        <h1 class="header">Login</h1>
        <form action="/login" method="POST">
        <div class="info">
            <div class="email">Email:<input type="email" name="email_input"></div>
            <div class="password">Password:<input type="password" name="password_input"></div> 
        </div>
        <div class="buttons">
            <button class="button1">Ok</button>
            <button class="button2"><a href="#">Cancel</a></button>
        </div>
        </form>
    </body>
</html>