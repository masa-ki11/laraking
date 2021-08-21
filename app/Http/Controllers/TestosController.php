<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;
// use League\Flysystem\Config;
// use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;


class TestosController extends Controller
{
    public function index(){
        // $client = new RakutenRws_Client();
        // // アプリID (デベロッパーID) をセットします
        // $client->setApplicationId('app.rakuten_id');
        // dd($client);
         
        // // 楽天商品ランキングAPIでは operation として 'IchibaItemRanking' を指定してください。
        // // ここでは例として keyword に、うどんを指定しています。
        // $response = $client->execute('IchibaItemRanking', array(
        //   'genreId' => '100227'
        // ));
        // // dd($response);


        // // レスポンスが正常かどうかを isOk() で確認することができます
        // if ($response->isOk()) {
        //     // 配列アクセスで情報を取得することができます。
        //     echo $response['title']."ランキングタイトル\n";
         
        //     // foreach で商品情報を順次取得することができます。
        //     foreach ($response as $item) {
        //         echo $item['itemName']."\n";
        //     }
        // } else {
        //     // getMessage() でレスポンスメッセージを取得することができます
        //     echo 'Error:'.$response->getMessage();
        // }
        
        $rakuten_apikey = config('app.rakuten_id');

        $client = new RakutenRws_Client();
        // アプリID (デベロッパーID) をセットします
        $client->setApplicationId($rakuten_apikey);
        // dd(rakuten_id);
        // アフィリエイトID をセットします(任意)
        // $client->setAffiliateId('YOUR_AFFILIATE_ID');

        // IchibaItem/Search API から、keyword=うどん を検索します
        $response = $client->execute('IchibaItemSearch', array(
            'keyword' => 'ブランド'
            // 'keyword' => '宗友'
        ));

        // dd($response);
        // レスポンスが正しいかを isOk() で確認することができます
        if ($response->isOk()) {
            // 配列アクセスによりレスポンスにアクセスすることができます。
            // var_dump($response['hits']);
            // dd($response);
            foreach($response as $item){
                // 保存処理をここに書く予定
                // print $item['itemName']."\n"."\n";
                // dd($item);
            }
        } else {
            echo 'Error:'.$response->getMessage();
        }

        // DB::table('tests')->insert([
        //     'title' => 'testa',
        // ]);

        return view('testo', compact('response'));


    }

}


// 総合ランキングの情報を取得する場合（サービス固有パラメーターを無指定）
// https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=[アプリID]