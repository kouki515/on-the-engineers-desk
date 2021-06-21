<?php

namespace App\Http\Controllers;

use App\Device;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $items = $user->devices()->get();

        return view('mypage', compact('user', 'items'));
    }

    public function delete(Request $request)
    {
        $device = new Device;
        $device->destroy($request->id);

        return redirect()->route('mypage.show');
    }

    public function new_self_introduction(Request $request)
    {
        $user = Auth::user();
        $user->self_introduction = $request->si;

        $user->save();

        return redirect()->route('mypage.show');
    }

    public function edit_self_introduction(Request $request)
    {
        $user = Auth::user();
        $user->self_introduction = $request->si;

        $user->save();

        return redirect()->route('mypage.show');
    }

    public function si_show()
    {
        return view('siform');
    }
}
