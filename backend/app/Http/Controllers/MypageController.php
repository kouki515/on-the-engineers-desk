<?php

namespace App\Http\Controllers;

use App\Device;
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
}
