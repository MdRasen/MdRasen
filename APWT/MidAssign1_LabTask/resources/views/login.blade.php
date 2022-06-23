<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>

<body>

    <center>
        <h1>This is Login Page!</h1>
    </center>

    @extends('layouts.beforelogin')
    @section('content')

    <br>

    <h1>{{Session::get('Message')}}</h1>
        <div>
            <fieldset>
                <legend>Login Form</legend>
                <form method="POST" action="">
                    {{@csrf_field()}}
                    <table>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="email" id="email" placeholder="Enter email"
                                    value="{{old('email')}}">
                                @error('email')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" id="password" placeholder="Enter password"
                                    value="{{old('password')}}">
                                @error('password')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Login"></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    @endsection

</body>

</html>
