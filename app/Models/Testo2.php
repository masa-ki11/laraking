<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Testo2 extends Model
{
    use HasFactory;

    public function ladi($arr_genre){
        // //レディース

        // ジャンルごとの保存
        foreach($arr_genre as $arr2){
            // dd(is_array($a));
            // dd($a[0]['Item']);
            // dd($a);
            if($arr2 != null && is_array($arr2)){
                foreach($arr2 as $item){
                    // dd($item);
    
                    // ジャンル用
                    // $rakuten_genre_url = 'https://app.rakuten.co.jp/services/api/IchibaGenre/Search/20140222'.'?applicationId='. $rakuten_apikey .'&genreId='. $item['Item']['genreId'];
                    // $json_genre = file_get_contents($rakuten_genre_url);
                    // $arr_genre = json_decode($json_genre,true);
                    // dd($arr_genre);
    
                    DB::table('ladies_fashions')->insert([
                        'title' => $arr_genre['title'],
                        'rank' => $item['Item']['rank'],
                        'itemName' => $item['Item']['itemName'],
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
        // ここまで
        return;
    }




}
