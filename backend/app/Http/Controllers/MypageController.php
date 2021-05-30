<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\User;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return view('mypage', compact('user'));
    }
}
