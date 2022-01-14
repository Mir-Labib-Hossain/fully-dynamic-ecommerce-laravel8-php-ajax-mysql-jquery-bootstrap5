<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;

class userController extends Controller
{
    function admin_login(){
        if(session()->has("admin")){
            return view("/admin",["products" => product::all()]);
        }else{
            return view("admin_login");
        }
    }
    function admin(Request $request)
    {
        if (($request->admin_name == "labib" && $request->password == "labib") || session()->has("admin")) {
            $request->session()->put("admin", "loggedin");
            return view("/admin",["products" => product::all()]);
        }else if(!session()->has("admin")){
            return view("/admin_login",["output"=>"Must Logged-in before accessing admin panel !"]);
        }
    }
    function login(Request $request)
    {
        $user = user::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return view("login",["output"=>"Email or Password didn't matched !"]);
        } else {
            $request->session()->put("user", $user);
            return redirect("/");
        }
    }
    function register(Request $request)
    {
        if (user::where("email", $request->email)->first()) {
            return "Email already exists !";
        } else if ($request->password != $request->confirm_password) {
            return "Confirm password didn't mached !";
        } else {
            $user = new user;
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $request->session()->put("user", $user);
            return redirect("/");
        }
    }
}
