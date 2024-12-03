<?php 
session_start();
function alterPayment(){
    if(){

    }
}

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
        <form action="/payment" method="POST">
        <div class="info">
            <p class="id">Payment ID<input type="text" name="ID"></p>
            <p class="due">Total Due</p>
            <p class="new">New Payment<input type="text" name="New"></p> 
        </div>
        <div class="buttons">
        <button class="button1"><a href="">Ok</a></button>
        <button class="button2"><a href="">Cancel</a></button>
        </div>
        </form>
    </body>
</html>