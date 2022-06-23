<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modify User</title>
</head>

<body>

    <center>
        <h1>This is User Modify Page!</h1>
    </center>

    @extends('layouts.afterlogin')
    @section('content')

    <br>

    {{-- <h1>{{Session::get('regMessage')}}</h1> --}}

        <div>
            <fieldset>
                <legend>User Modify Form</legend>
    
                <form method="POST" action="">
                    {{@csrf_field()}}
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" id="name" placeholder="Enter your name"
                                    value="{{$clients->name}}">
                                @error('name')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="email" id="email" placeholder="Enter your email"
                                    value="{{$clients->email}}">
                                @error('email')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" id="password" placeholder="Enter password" value="{{$clients->password}}">
                                @error('password')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password:</td>
                            <td><input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" value="{{$clients->password}}">
                                @error('cpassword')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Type:</td>
                            <td><select name="type" id="type" value="user">
                                    <option value="User">User</option>
                                    <option value="Admin" <?php If($clients->type=="Admin"){
                                        echo "selected";
                                    }?>>Admin</option>
                                </select>
                                @error('type')
                                {{$message}} <br>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Modify"></td>
                        </tr>
                    </table>
                </form>
    
            </fieldset>
        </div>

    @endsection

</body>

</html>
