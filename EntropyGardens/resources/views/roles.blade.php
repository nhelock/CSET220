@extends('layouts.app')

@section('title', 'Entropy Payments')

@section('content')

<link rel=stylesheet href='/CSS/roles.css'>

<table class='role-content'>
    <tr>
        <th class='role-headings'>Roles</th>
        <th class='role-headings'>Add New Role</th>
    </tr>
    <tr>
        <td>
            <table class='role-table'>
                <tr>
                    <th>Role Name:</th>
                    <th>Access Level:</th>
                </tr>
            
                <?php foreach($roles as $role){ ?>
            
                <tr>
                    <td>{{ $role->roleName }}</td>
                    <td>{{ $role->accesslevel }}</td>
                </tr>  
            
                <?php } ?>
            </table>
        </td>
        <td class='form-td'>
            <form action=/api/roles method=POST>
                <table class='form-table' style="padding-left: 10px">
                    <tr>
                        <td><label for=accesslevel>Access Level:</label></td>
                        <td><input type=number name=accesslevel class=role-input></td>
                    </tr>
                    <tr>
                        <td><label for=roleName>Role Name:</label></td>
                        <td><input type=text name=roleName class=role-input></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type=submit>Add New Role</button></td>
                    </tr>
                </table>
                
            </form>
        </td>
    </tr>

</table>

@endsection