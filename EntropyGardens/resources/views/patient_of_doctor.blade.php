<html>
<head>
    <title>Patient of Doctor</title>
    <style>
        body {
            display: block;
            background-color: #AA7DCE;
            color: #f5d7e3;
            text-align: center;
        }
        .old, .new {
            display: flex;
            justify-content: center;
            height: 12%;
            padding: 10px;
        }
        .newper {
            padding-top: 60px;
        }
        .button {
            background-color: #3b429f;
            color: #f5d7e3;
            border: 2px solid #3b429f;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #2a3170;
        }
        .flex-box {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 10px;
            background-color: #a85573;
            color: #f5d7e3;
            min-width: 100px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Patient of Doctor</h1>
    <div class="old">
        <div class="flex-box">
            <p>Date</p>
        </div>
        <div class="flex-box">
            <p>Comment</p>
        </div>
        <div class="flex-box">
            <p>Morning Med</p>
        </div>
        <div class="flex-box">
            <p>Afternoon Med</p>
        </div>
        <div class="flex-box">
            <p>Night Med</p>
        </div>
    </div>
    <div class="newper">
        <button class="button">New Prescription</button>
        <div class="new">
            <div class="flex-box">
                <p>Comment</p>
            </div>
            <div class="flex-box">
                <p>Morning Med</p>
            </div>
            <div class="flex-box">
                <p>Afternoon Med</p>
            </div>
            <div class="flex-box">
                <p>Night Med</p>
            </div>
        </div>
    </div>
    </form>
</body>
</html>