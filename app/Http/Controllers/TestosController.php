<?php

namespace App\Http\Controllers;

use App\Models\Func;
use Illuminate\Http\Request;
use RakutenRws_Client;
// use League\Flysystem\Config;
// use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Testo;
use App\Models\Testo2;
use Dotenv\Parser\Value;

class TestosController extends Controller
{

    public function savetest(){
        $rakuten_apikey = config('app.rakuten_id');
        $aff_key = config('app.rakuten_aff_id');
        $rakuten_url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' 
        . $rakuten_apikey . '&affiliateId=' . $aff_key;
        $json = file_get_contents($rakuten_url);
        $arr = json_decode($json,true);
        $func = new Func();
        $func->sougou($arr);

        return view('testo');
    }

    public function index(){    
        
         // //レディース
        $genreId = 100371;
        $rakuten_apikey = config('app.rakuten_id');
        $rakuten_url_genre = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey . '&genreId=' . $genreId;
        $json_genre = file_get_contents($rakuten_url_genre);
        $arr_genre = json_decode($json_genre,true);

        // DB::table('rakuten_items')->delete();
        // DB::table('ladies_fashions')->delete();
        // $aa = new Testo();
        // $testo2 = new Testo2();
        // // $num = 0;
        // $testo2->ladi($arr_genre);
        // $aa->sougou();        
        $func = new Func();

        
        $genreIdDbName_array = [
            [100371,'ladies_fashions'],
            [551177, 'mens_fashions'],
            [100433,'inners'],
            [216131, 'bags'],
            [558885, 'shoes'],
            [558929, 'watches'],
            [216129, 'jewelries'],
            [100227, 'foods'],
            [551167, 'snacks'],//スイーツ
            [100316, 'waters'],
            [510915, 'beers'],
            [100317, 'wines'],
            [510901, 'sakes'],
            [215783, 'stationaries'],
            [100938, 'diets'],
            [551169, 'pharmaceuticals'],
            [100939, 'beauties'],
            [100533, 'kids'],
            [566382, 'toys'],
            [562637, 'home_appliances'],
            [211742, 'tvs'],
            [564500, 'smart_phones'],
            [100026, 'pcs'],
            [101070, 'sports'],
            [503190, 'cars'],
            [100804, 'interiors'],
            [558944, 'kitchenware'],
            [101213, 'pets'],
            [100005, 'flowers'],
            [101438, 'services'],
            [101205, 'games'],
            [101164, 'hobbies'],
            [112493, 'instruments'],
        ];
        foreach($genreIdDbName_array as $idAndDbName){
            if($idAndDbName != null && is_array($idAndDbName)){
                $func->SaveData($idAndDbName[0],$idAndDbName[1]);
            }
        }
    // $func = new Func();
    
    // foreach($genreIdDbName_array as $idAndDbName){
    //     if($idAndDbName != null && is_array($idAndDbName)){
    //         $func->SaveData($idAndDbName[0],$idAndDbName[1]);
    //     }
    // }


        // // //総合ランキング
        // $rakuten_apikey = config('app.rakuten_id');
        // $rakuten_url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey;
        // $json = file_get_contents($rakuten_url);
        // $arr = json_decode($json,true);

        // // dd($arr);
        // foreach($arr as $item_arr){
        //     // dd($a[0]['Item']);
        //     // dd($a);
        //     foreach($item_arr as $item){
        //         // dd($item['Item']);
        //         DB::table('rakuten_items')->insert([
        //             // 'title'もデータが存在しないため、後ほど削除
        //             // 今はジャンルの名前を保存
        //             // 'title' => $item_arr['current']['genreName'],
                    
        //             'rank' => $item['Item']['rank'],
        //             // 'itemName' => $item['Item']['itemName'],
        //             'itemUrl' => $item['Item']['itemUrl'],
        //             'affiliateUrl' => $item['Item']['affiliateUrl'],
        //             'itemPrice' => $item['Item']['itemPrice'],
        //             'itemCaption' => $item['Item']['itemCaption'],
        //             'reviewCount' => $item['Item']['reviewCount'],
        //             'reviewAverage' => $item['Item']['reviewAverage'],
        //             'imageFlag' => $item['Item']['imageFlag'],
        //             'mediumImageUrls' => $item['Item']['mediumImageUrls'][0]['imageUrl'],
        //             'shopName' => $item['Item']['shopName'],
        //             'shopUrl' => $item['Item']['shopUrl'],
        //             'genreId' => (int)$item['Item']['genreId'],
        //             'created_at' => date("Y/m/d H:i:s")
        //         ]);

        //     }
        // }

        // 削除
        // DB::table('rakuten_items')->delete();

        
        return view('testo', compact('arr_genre'));
        // return redirect('testo');
        // return view('testo');
    }

    // public function ladi(){
    //     // //レディース
    //     $genreId = 100371;
    //     // $rakuten_apikey = config('app.rakuten_id');
    //     $rakuten_url_genre = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey . '&genreId=' . $genreId;
    //     $json_genre = file_get_contents($rakuten_url_genre);
    //     // $json = json_decode($rakuten_url);
    //     $arr_genre = json_decode($json_genre,true);
    //     // dd($arr_genre);
    //     // ジャンルごとの保存
    //     foreach($arr_genre as $a){
    //         // dd($a[0]['Item']);
    //         // dd($a);
    //         foreach($a as $item){
    //             // dd($item);

    //             // ジャンル用
    //             // $rakuten_genre_url = 'https://app.rakuten.co.jp/services/api/IchibaGenre/Search/20140222'.'?applicationId='. $rakuten_apikey .'&genreId='. $item['Item']['genreId'];
    //             // $json_genre = file_get_contents($rakuten_genre_url);
    //             // $arr_genre = json_decode($json_genre,true);
    //             // dd($arr_genre);

    //             DB::table('ladies_fashions')->insert([
    //                 'title' => $arr_genre['title'],
    //                 'rank' => $item['Item']['rank'],
    //                 'itemName' => $item['Item']['itemName'],
    //                 'itemUrl' => $item['Item']['itemUrl'],
    //                 'affiliateUrl' => $item['Item']['affiliateUrl'],
    //                 'itemPrice' => $item['Item']['itemPrice'],
    //                 'itemCaption' => $item['Item']['itemCaption'],
    //                 'reviewCount' => $item['Item']['reviewCount'],
    //                 'reviewAverage' => $item['Item']['reviewAverage'],
    //                 'imageFlag' => $item['Item']['imageFlag'],
    //                 'mediumImageUrls' => $item['Item']['mediumImageUrls'][0]['imageUrl'],
    //                 'shopName' => $item['Item']['shopName'],
    //                 'shopUrl' => $item['Item']['shopUrl'],
    //                 'genreId' => (int)$item['Item']['genreId'],
    //                 'created_at' => date("Y/m/d H:i:s")
    //             ]);
    //         }
    //     }
    //     // ここまで
    // }

}