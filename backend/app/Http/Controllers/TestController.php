<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;

class TestController extends Controller
{
    public function show()
    {
        return view('test');
    }

    public function test(Request $request)
    {
        //楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成
        $client = new RakutenRws_Client();

        //定数化
        define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));
        define("RAKUTEN_APPLICATION_SEACRET", config('app.rakuten_key'));

        //アプリIDをセット
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        //リクエストから検索キーワードを取り出し
        $itemCode = $request->input('itemCode');

        // IchibaItemSearch API から、指定条件で検索
        if (!empty($itemCode)) {
            $response = $client->execute('IchibaItemSearch', array(
            //入力パラメーター
            'itemCode' => $itemCode,
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
                'mediumImageUrls' => $str,
            );
                }
                // dd($items);
                return view('test', compact('items'));
            } else {
                echo 'Error:'.$response->getMessage();
            }
        }
    }
}
