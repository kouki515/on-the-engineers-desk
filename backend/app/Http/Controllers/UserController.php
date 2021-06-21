<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RakutenRws_Client;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function show($id)
    {
        //楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成
        $client = new RakutenRws_Client();

        //定数化
        define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));
        define("RAKUTEN_APPLICATION_SEACRET", config('app.rakuten_key'));

        //アプリIDをセット
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        // ユーザーデータを取得
        $user = User::findorFail($id);
        // ユーザーに紐付いたアイテムのコードを取得
        $user_items = $user->devices()->get();
        // 返り値を宣言
        $items = array();

        foreach ($user_items as $itemCode) {

            //配列から検索キーワードを取り出し
            $itemCode = $itemCode['itemCode'];

            // IchibaItemSearch API から、指定条件で検索
            if (!empty($itemCode)) {
                $response = $client->execute('IchibaItemSearch', array(
                //入力パラメーター
                'itemCode' => $itemCode,
            ));
                // レスポンスが正しいかを isOk() で確認することができます
                if ($response->isOk()) {

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
                } else {
                    echo 'Error:'.$response->getMessage();
                }
            }
        }

        return view('user', compact('user', 'items'));
    }
}
