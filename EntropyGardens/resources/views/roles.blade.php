@extends('layouts.app')

@section('title', 'Entropy Payments')

@section('content')

<h1>Roles</h1>

<table>
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

<h1>Add New Role:</h1>
<form action=/api/roles method=POST>
    <label for=accesslevel>Access Level:</label>
    <input type=number name=accesslevel>

    <label for=roleName>Role Name:</label>
    <input type=text name=roleName>

    <button type=submit>Add New Role</button>
</form>

@endsection