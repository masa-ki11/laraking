<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Testo extends Model
{
    use HasFactory;

    public function sougou(){
        // //総合ランキング
        $rakuten_apikey = config('app.rakuten_id');
        $rakuten_url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey;
        $json = file_get_contents($rakuten_url);
        $arr = json_decode($json,true);

        // dd($arr);
        foreach($arr as $item_arr){
            // dd($a[0]['Item']);
            // dd($a);
            if($item_arr != null && is_array($item_arr)){
                foreach($item_arr as $item){
                    // dd($item['Item']);
                    DB::table('rakuten_items')->insert([
                        // 'title'もデータが存在しないため、後ほど削除
                        // 今はジャンルの名前を保存
                        // 'title' => $item_arr['current']['genreName'],
                        
                        'rank' => $item['Item']['rank'],
                        // 'itemName' => $item['Item']['itemName'],
                        'itemUrl' => $item['Item']['itemUrl'],
                        'affiliateUrl' => $item['Item']['affiliateUrl'],
                        'itemPrice' => $item['Item']['itemPrice'],
                        'itemCaption' => $item['Item']['itemCaption'],
                        'reviewCount' => $item['Item']['reviewCount'],
                        'reviewAverage' => $item['Item']['reviewAverage'],
                        'imageFlag' => $item['Item']['imageFlag'],
                        'mediumImageUrls' => $item['Item']['mediumImageUrls'][0]['imageUrl'],
                        'shopName' => $item['Item']['shopName'],
                        'shopUrl' => $item['Item']['shopUrl'],
                        'genreId' => (int)$item['Item']['genreId'],
                        'created_at' => date("Y/m/d H:i:s")
                    ]);
    
                }
            }
        }
        return;
    }

}
