{{-- <html>
    <head>
        <title>
            Registation Approval
        </title>
        
    </head>
    <body> --}}
        @extends('layouts.app')

        @section('title', 'Entropy Gardens')
    
        @section('content')
        <link rel="stylesheet" href="/CSS/regApproval.css">
        <div class="heading">
        <h1>
            Registration Approval
        </h1>
        </div>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Approve?</th>
                {{-- <th>Confirm</th> --}}
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                    foreach($users as $user){
                        if($user->isRegistered == false){
                ?>
                {{-- <form id="form" action='/api/approval' method='POST'> --}}
                    <td>{{ $user->firstName }} {{ $user->lastName }}</td>
                    <td>{{ $user->roleName }}</td>
                    <td>
                        <div class='form-container'>
                            <form id="form" action='/api/approval' method='POST'>
                                @csrf
                                <input type=hidden name=confirm value='true'>
                                <input type=hidden name=role value={{ $user->roleName }}>
                                <input type=hidden name=userID value={{ $user->userID }}>
                                <button type="submit" class="button">Yes</button>
                            </form>
                            <form id="form" action='/api/approval' method='POST'>
                                @csrf
                                <input type=hidden name=confirm value='false'>
                                <input type=hidden name=role value={{ $user->roleName }}>
                                <input type=hidden name=userID value={{ $user->userID }}>
                                <button type='submit' class="c-button">No</button>
                            </form>
                        </div>
                        {{-- <input type="radio" id="Yes" name="confirm_role" value="Yes">
                        <label for="Yes">Yes</label>
                        <input type="radio" id="No" name="confirm_role" value="No">
                        <label for="No">No</label> --}}

                    </td>
                    {{-- <td>
                        <button type="submit" class="button" form="form">Ok</button>
                        <button type="reset" class="c-button" form="form">Cancel</button>
                    </td>     --}}
                </form>
            </tr>
                <?php
                    }}
                ?>        


            </tbody>
            
        </table>
        <script src="script.js"></script>
        @endsection
    {{-- </body>
    
</html> --}}