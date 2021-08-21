<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    
    public function index () 
    {
        $users = User::get();
        // $hello = \DB::table('Users')->get();
        // dd($hello);
        // $hello_array = [\DB::table('Users')->get()];

        return view('index', compact('users'));
    }
}
