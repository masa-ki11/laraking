<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use RakutenRws_Client;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // 自動処理テスト用
        $schedule->call(function () {
            // DB::table('recent_users')->delete();
            // DB::table('tests')->insert([
            //     'title' => 'testa',
            // ]);
            // })->daily();

        // 総合ランキング
        //ここから０８２８作成 デイリーのデータ取得
        $genreID = 100283;
        // $rakuten_url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey . '&genreId=' . $genreID;
        
        // //総合ランキング
        $rakuten_apikey = config('app.rakuten_id');
        $rakuten_url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey;
        $json = file_get_contents($rakuten_url);
        // $json = json_decode($rakuten_url);
        $arr = json_decode($json,true);

        // dd($arr);
        foreach($arr as $a){
            // dd($a[0]['Item']);
            // dd($a);
            foreach($a as $item){
                // dd($item);

                // ジャンル用
                // $rakuten_genre_url = 'https://app.rakuten.co.jp/services/api/IchibaGenre/Search/20140222'.'?applicationId='. $rakuten_apikey .'&genreId='. $item['Item']['genreId'];
                // $json_genre = file_get_contents($rakuten_genre_url);
                // $arr_genre = json_decode($json_genre,true);
                // dd($arr_genre);

                DB::table('rakuten_items')->insert([
                    // 'title'もデータが存在しないため、後ほど削除
                    // 今はジャンルの名前を保存
                    // 'title' => $arr_genre['current']['genreName'],
                    
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

        
        //レディース
        $genreId = 100371;
        $rakuten_apikey = config('app.rakuten_id');
        $rakuten_url_genre = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey . '&genreId=' . $genreId;
        $json_genre = file_get_contents($rakuten_url_genre);
        // $json = json_decode($rakuten_url);
        $arr_genre = json_decode($json_genre,true);
        // dd($arr_genre);
        // ジャンルごとの保存
        foreach($arr_genre as $a){
            // dd($a[0]['Item']);
            // dd($a);
            foreach($a as $item){
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
        // ここまで

    })->everyMinute()->runInBackground();






        //旧
        // $rakuten_apikey = config('app.rakuten_id');
        // $client = new RakutenRws_Client();
        // $client->setApplicationId($rakuten_apikey);
        // $response = $client->execute('IchibaItemSearch', array(
        //     'keyword' => 'ブランド'
        // ));

        // if ($response->isOk()) {
        //     foreach($response as $item){
        //     DB::table('rakuten_items')->insert([
        //         // 'title' => $item['title'],
        //         // 'rank' => $item['rank'],
        //         'title' => 'title',
        //         'rank' => 10,
        //         'itemName' => $item['itemName'],
        //         'itemUrl' => $item['itemUrl'],
        //         'affiliateUrl' => $item['affiliateUrl'],
        //         'itemPrice' => $item['itemPrice'],
        //         'itemCaption' => $item['itemCaption'],
        //         'reviewCount' => $item['reviewCount'],
        //         'reviewAverage' => $item['reviewAverage'],
        //         'imageFlag' => $item['imageFlag'],
        //         'smallImageUrls' => $item['smallImageUrls'][0]['imageUrl'],
        //         'shopName' => $item['shopName'],
        //         'shopUrl' => $item['shopUrl'],
        //         'genreId' => (int)$item['genreId'],
        //         'created_at' => date("Y/m/d H:i:s")
        //     ]);
        // }
        // } else {
        //     echo 'Error:'.$response->getMessage();
        // }
        // })->everyMinute()
        // ->runInBackground();
        
        }     

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
