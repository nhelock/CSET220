@extends('layouts.app')

@section('title', 'Entropy Payments')

@section('content')
    <link rel='stylesheet' href='/CSS/paymentPage.css'>

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
            <h1 style=margin:auto;text-align:center;>Process Payment</h1> {{-- Change this if you want to whatever element type you want, I'm not picky, I'm just tired --}}
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
                
                </table>
            
                <br> {{-- Again, remove the <br> if you need to, just placeholder for readability --}}
                

                <button type=submit>Submit Payment</button>
            </form>
        </div>
    </div>


@endsection