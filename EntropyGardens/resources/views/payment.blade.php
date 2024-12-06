@extends('layouts.app')

@section('title', 'Entropy Payments')

@section('content')
    {{-- <link rel='stylesheet' href='/CSS/whateverYouWant.css'> --}}
    <style>

/* Basic Shit */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4ea;
}

p {
    font-size: 18px;
    color: black;
}

h1 {
    color: black;
    font-size: 24px;
    margin-top: 30px;
    text-align: center;
}

.table-form-container {
    display: flex;
    justify-content: space-between;
    gap: 30px;
    margin: 20px auto;
    width: 80%;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid lightgray;
}

th {
    background-color: #F4A5AE;
    color: black;
    font-weight: bold;
}

td {
    background-color: white;
    color: black;
}

tr:hover td {
    background-color: #f5d7e3;
}

/* Form */
form {
    width: 100%;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

form table {
    width: 100%;
}

form label {
    font-size: 16px;
    color: black;
    display: inline-block;
    margin-bottom: 10px;
}

form input {
    width: 100%;
    padding: 12px;
    margin: 5px 0 15px 0;
    border: 1px solid gray;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

form input[type="number"] {
    width: 50%;
}

form button {
    background-color: #2ecc71;
    color: white;
    font-size: 18px;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #27ae60;
}

/* Placeholders */
input::placeholder {
    color: gray;
}
</style>

    <p>Welcome to the Payment Page, {{ session('firstName') }}!</p>

    <div class="table-form-container">
        <div class="table-container">
            <table>
                <tr>
                    <th>UserID</th>
                    <th>Name</th>
                    <th>Payment Due</th>
                </tr>
                <?php if(isset($patients)){foreach($patients as $patient){ ?>
                
                <tr>
                    <td>{{ $patient->userID }}</td>
                    <td>{{ $patient->firstName }} {{ $patient->lastName }}</td>
                    <td>{{ $patient->payTab }}</td>
                </tr>

                <?php }} ?>
            </table>
        </div>
    
        <div class="form-container">
            <h1>Process Payment</h1> {{-- Change this if you want to whatever element type you want, I'm not picky, I'm just tired --}}
            <form action='/api/payment' method=POST>
                @csrf
                <table>
                    <tr>
                        <td><label for=userID>User ID:</label></td>
                        <td><input type=number placeholder=userID name=userID></td>
                    </tr>
                    <tr>
                        <td><label for=amount>Amount Paid:</label></td>
                        <td><input type=number placeholder="Amount Paid" name=amount></td>
                    </tr>

                </table>
            
                <br> {{-- Again, remove the <br> if you need to, just placeholder for readability --}}
                

                <button type=submit>Submit Payment</button>
            </form>
        </div>
    </div>

@endsection