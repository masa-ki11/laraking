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
        // $json = json_decode($response,true);

        // dd($response);
        // dd(gettype($response));
        // ※responseはobject
        // dd(get_object_vars($response)); だめ
        
        // 削除用
        DB::table('rakuten_items')->truncate();
        DB::table('tests')->truncate();

        //ここから０８２８作成 デイリーのデータ取得
        $genreID = 100283;
        // $rakuten_url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey . '&genreId=' . $genreID;
        
        //総合ランキング
        $rakuten_url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey;
        $json = file_get_contents($rakuten_url);
        // $json = json_decode($rakuten_url);
        $arr = json_decode($json,true);

        // dd($arr);
        // foreach($arr as $a){
        //     // dd($a[0]['Item']);
        //     // dd($a);
        //     // foreach($a as $b){
        //     //     // dd($b['Item']['itemPrice']);
        //     // }
        // }
        //ここまで

        // レスポンスが正しいかを isOk() で確認することができます
        if ($response->isOk()) {
            // 配列アクセスによりレスポンスにアクセスすることができます。
            // var_dump($response['hits']);
            // dd($json);
            // dd($response['isOK']);
            foreach($response as $item){
                // dd(gettype($item)); ※array
            // foreach($json as $item){
                // 保存処理をここに書く予定
                // print $item['itemName']."\n"."\n";
                // dd(gettype($item));
                // dd(gettype($item['genreId']));
                // dd(date("Y/m/d H:i:s"));
                // $genreID = $item['genreId'];
                // DB::table('tests')->insert([
                //     'title' => $item['itemName'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'rank' => 10,
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'itemName' => $item['itemName'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'itemUrl' => $item['itemUrl'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'affiliateUrl' => $item['affiliateUrl'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'itemPrice' => $item['itemPrice'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'reviewCount' => $item['reviewCount'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'reviewAverage' => $item['reviewAverage'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'imageFlag' => $item['imageFlag'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'smallImageUrls' => $item['smallImageUrls'][0]['imageUrl'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'shopName' => $item['shopName'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'shopUrl' => $item['shopUrl'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'genreId' => $item['genreId'],
                // ]);成功
                // DB::table('rakuten_items')->insert([
                //     'created_at' => date("Y/m/d H:i:s"),
                // ]);成功
                // dump($items['itemName']);
                // foreach($items as $item){
                    // dd($items['itemName'][100]);

                DB::table('rakuten_items')->insert([
                    // 'title' => $item['title'],
                    // 'rank' => $item['rank'],
                    'title' => 'title',
                    'rank' => 10,
                    'itemName' => $item['itemName'],
                    'itemUrl' => $item['itemUrl'],
                    'affiliateUrl' => $item['affiliateUrl'],
                    'itemPrice' => $item['itemPrice'],
                    'itemCaption' => $item['itemCaption'],
                    'reviewCount' => $item['reviewCount'],
                    'reviewAverage' => $item['reviewAverage'],
                    'imageFlag' => $item['imageFlag'],
                    'mediumImageUrls' => $item['mediumImageUrls'][0]['imageUrl'],
                    'shopName' => $item['shopName'],
                    'shopUrl' => $item['shopUrl'],
                    'genreId' => (int)$item['genreId'],
                    'created_at' => date("Y/m/d H:i:s")
                ]);
                // ジャンル用 カーネルと違いあり 上のテーブルに、genreNameを追加したほうがいいかも
                // dd($item);
                $rakuten_genre_url = 'https://app.rakuten.co.jp/services/api/IchibaGenre/Search/20140222'.'?applicationId='. $rakuten_apikey .'&genreId='. $item['genreId'];
                // dd($rakuten_genre_url);
                $json_genre = file_get_contents($rakuten_genre_url);
                $arr_genre = json_decode($json_genre,true);
                // dd($arr_genre['current']['genreName']);
                DB::table('genres')->insert([
                    'genreTitle' => $arr_genre['current']['genreName'],
                    'created_at' => date("Y/m/d H:i:s")
                ]);
            }
            
            // }
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

// ジャンル
// https://app.rakuten.co.jp/services/api/IchibaGenre/Search/20140222?applicationId=[アプリID]