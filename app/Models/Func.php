<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Func extends Model
{
    use HasFactory;

    public function sougou($arr){
        foreach($arr as $item_arr){
            if($item_arr != null && is_array($item_arr)){
                foreach($item_arr as $item){    
                    DB::table('rakuten_items')->insert([
                        // 'title'もデータが存在しないため、後ほど削除
                        // 今はジャンルの名前を保存
                        // 'title' => $arr_genre['current']['genreName'],
                        
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
    }


    public function genre($arr_genre){
        foreach($arr_genre as $item_arr){
            if($item_arr != null && is_array($item_arr)){
                foreach($item_arr as $item){
                    DB::table('ladies_fashions')->insert([
                        'title' => $arr_genre['title'],
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
    }




}
