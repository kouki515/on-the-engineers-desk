<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;
use App\Device;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function show()
    {
        return view('search');
    }

    public function store(Request $request)
    {
        $device = new Device();
        $device->itemCode = $request->itemCode;
        $device->user_id = Auth::id();

        $device->save();

        return redirect()->route('mypage.show');
    }

    public function search(Request $request)
    {
        //楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成
        $client = new RakutenRws_Client();

        //定数化
        define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));
        define("RAKUTEN_APPLICATION_SEACRET", config('app.rakuten_key'));

        //アプリIDをセット
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        //リクエストから検索キーワードを取り出し
        $keyword = $request->input('keyword');

        // IchibaItemSearch API から、指定条件で検索
        if (!empty($keyword)) {
            $response = $client->execute('IchibaItemSearch', array(
            //入力パラメーター
            'keyword' => $keyword,
        ));
            // レスポンスが正しいかを isOk() で確認することができます
            if ($response->isOk()) {
                // dd($response);
                $items = array();
                //配列に結果を代入
                foreach ($response as $item) {
                    //画像サイズを変えたかったのでURLを整形します
                    $str = str_replace("_ex=128x128", "_ex=500x500", $item['mediumImageUrls'][0]['imageUrl']);
                    $items[] = array(
                'itemName' => $item['itemName'],
                'itemPrice' => $item['itemPrice'],
                'itemUrl' => $item['itemUrl'],
                'itemCode' => $item['itemCode'],
                'mediumImageUrls' => $str,
            );
                }
                // dd($items);
                return view('search', compact('items'));
            } else {
                echo 'Error:'.$response->getMessage();
            }
        }
    }
}
