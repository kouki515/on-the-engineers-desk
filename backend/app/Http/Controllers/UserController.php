<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Device;
use Illuminate\Routing\Route;
use RakutenRws_Client;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function show($id)
    {
        // ユーザーデータを取得
        $user = User::findorFail($id);

        if ($id == Auth::id()) {
            return redirect()->route('mypage.show');
        }

        // ユーザーに紐付いたアイテムのレコードを取得
        $items = $user->devices()->get();

        $sum = 0;

        foreach ($items as $item) {
            $sum += $item['itemPrice'];
        }

        return view('user', compact('user', 'items', 'sum'));
    }

    public function store(Request $request)
    {
        $device = new Device();
        $device->itemName = $request->itemName;
        $device->itemPrice = $request->itemPrice;
        $device->itemUrl = $request->itemUrl;
        $device->mediumImageUrls = $request->mediumImageUrls;
        $device->user_id = Auth::id();

        $device->save();

        return redirect()->route('mypage.show');
    }
}
