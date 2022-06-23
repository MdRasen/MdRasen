<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>

<body>

    <center>
        <h1>This is Registration Page!</h1>
    </center>

    @extends('layouts.beforelogin')
    @section('content')

    <br>

    <h1>{{Session::get('regMessage')}}</h1>

        <div>
            <fieldset>
                <legend>Register Form</legend>
    
                <form method="POST" action="">
                    {{@csrf_field()}}
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" id="name" placeholder="Enter your name"
                                    value="{{old('name')}}">
                                @error('name')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="email" id="email" placeholder="Enter your email"
                                    value="{{old('email')}}">
                                @error('email')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" id="password" placeholder="Enter password">
                                @error('password')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password:</td>
                            <td><input type="cpassword" name="cpassword" id="cpassword" placeholder="Confirm password">
                                @error('cpassword')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td><select name="type" id="type" value="user">
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                @error('type')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Register"></td>
                        </tr>
                    </table>
                </form>
    
            </fieldset>
        </div>

    @endsection

</body>

</html>
