<?php 
?>
<html>
    <head>
        <style>
            body {
                display: block;
                background-color: #AA7DCE;
            }
            .info {
                color: #f5d7e3;
                gap: 18%;
                padding: 1%;
            }
            .buttons {
                text-align: center;
                margin-top: 20px;
            }
            .button1, .button2 {
                background-color: #a85573;
                color: #f5d7e3;
                border: none;
                border-radius: 10px;
                padding: 10px 20px;
                margin: 5px;
                cursor: pointer;
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
            .id, .due, .new {
                border: 2px solid #3b429f;
                border-radius: 0px 20px;
                background-color: #3b429f;
                margin-right: 85%;
                padding-left: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Payment</h1>
        @foreach ($outstanding_balances as $o)
        <form action="/api/payment" method="POST">
            <div class="info">
                <p class="id">Payment ID</p>
                <input value="{{ $o->userID }}" name="userID" readonly>

                <p class="due">Total Due</p>
                <input value="{{ $o->payTab }}" name="payTab" readonly>
                <input value="{{ $o->balanceID }}" name="balanceID" readonly type="hidden">

                <p class="new">New Payment<input type="text" value="" name="New" required></p> 
            </div>
            <div class="buttons">
                <input class="button1" type="submit" value="Ok">
                <button class="button2"><a href="">Cancel</a></button>
            </div>
        </form>
        @endforeach
    </body>
</html>