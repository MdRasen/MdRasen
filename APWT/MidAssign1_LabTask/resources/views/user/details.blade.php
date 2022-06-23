<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Details</title>
</head>
<body>

    <center>
        <h1>This is User Details Page!</h1>
    </center>
    
    @extends('layouts.afterlogin')
    @section('content')
    <br>

        <center>
            <div>

                <table border="1">
                    <tr>
                        <th colspan="6">User details of: {{$clients->name}}</th>
                    </tr>
                    <tr>
                        <th>ID:</th>
                        <th>Name:</th>
                        <th>Email:</th>
                        <th>Password:</th>
                        <th>Type:</th>
                        <th>Joining Date:</th>
                    </tr>
                    <tr>
                        <td>{{$clients->id}}</td>
                        <td>{{$clients->name}}</td>
                        <td>{{$clients->email}}</td>
                        <td>{{$clients->password}}</td>
                        <td>{{$clients->type}}</td>
                        <td>{{$clients->created_at}}</td>
                    </tr>
                </table>

                {{-- <b>ID: </b>{{$clients->id}} <br>
                <b>Name: </b>{{$clients->name}} <br>
                <b>Email: </b>{{$clients->email}} <br>
                <b>Password: </b>{{$clients->password}} <br>
                <b>Type: </b>{{$clients->type}} <br>
                <b>Created At: </b>{{$clients->created_at}} <br> --}}
     
             </div>
        </center>

    @endsection
    
</body>
</html>