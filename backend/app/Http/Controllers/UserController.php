<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\User;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        return view('mypage', compact('user'));
    }

    public function show()
    {
        // $user = Auth::user();
        $user = User::findorFail($id);

        return view('users', compact('user'));
    }
}
