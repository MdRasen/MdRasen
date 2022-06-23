<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    function welcome(){
        return view("welcome");
    }

    function register(){
        return view("register");
    }

    function login(){
        return view("login");
    }

    function dashboard(){
        $clients = [];
        $clients = client::all();
        return view("dashboard")->with('clients', $clients);
    }

    function details($id){
        $clients = [];
        $clients = client::where('id', '=', $id)->first();
        return view("user.details")->with('clients', $clients);
    }

    function registerForm(Request $req){
        $this->validate($req, [
            "name" => "required|regex:/^[a-z ,.'-]+$/i",
            "email" => "required|email",
            "password" => "required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/",
            "cpassword" => "required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|same:password"
        ]);

        $cl = new client();
        $cl->name = $req->name;
        $cl->email = $req->email;
        $cl->password = $req->password;
        $cl->type = $req->type;

        $cl->save();

        session()->flash('regMessage', "Registration has been done!");

        return redirect()->route('register');       
    }

    function loginForm(Request $req){
        $this->validate($req, [
            "email" => "required|email",
            "password" => "required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/"
        ]);

        $cl = new client();
        $cl->email = $req->email;
        $cl->password = $req->password;
        
        $clients = client::where('email', '=', $cl->email)->first();

        if($clients == null){
            return "User not found!";
        }

        if($cl->email==$clients->email){
            if($cl->password==$clients->password){
                if($clients->type == "Admin"){
                    
                    session()->put('loginStatus', "logged");

                    return redirect()->route('dashboard');
                }
                else{
                    
                    session()->put('loginStatus', "logged");

                    return redirect()->route('userDashboard');
                }
            }
            else{
                return "Invalid password!";
            }
        }
        else{
            return "Invalid email address!";
        }
        
    }

    function userDashboard(){
        $clients = [];
        $clients = client::all();
        return view("userDashboard")->with('clients', $clients);
    }

    function logout(){
        session()->forget('loginStatus');
        session()->flash('Message','You have been sucessfully logged out!');
        return redirect()->route('login');
    }

    function modifyUser($id){

        $clients = [];
        $clients = client::where('id', '=', $id)->first();
        return view("modify")->with('clients', $clients);
    }

    function modifyForm(Request $req, $id){
        $clients = client::find($id);

        $clients->name = $req->name;
        $clients->email = $req->email;
        $clients->password = $req->password;
        $clients->type = $req->type;
        $clients->update();


        session()->flash('modMessage', "User has been modified!");
        return redirect()->route('dashboard');
        // echo $clients;
        // echo "Ok";
              
    }

    function deleteUser($id){

        $clients = client::where('id', $id)->delete();
        session()->flash('delMessage', "User has been deleted!");

        return redirect()->route('dashboard'); 
    }
}
