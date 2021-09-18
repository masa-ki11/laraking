<?php

namespace App\Console;

use App\Models\Func;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use RakutenRws_Client;
use Illuminate\Database\Eloquent\Model;

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

        $sou = new Func();
        $sou->sougou($arr);

        // genreIdを配列に格納→foreachで関数を実行予定
        //レディース
        $genreId = 100371;
        $rakuten_url_genre = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' . $rakuten_apikey . '&genreId=' . $genreId;
        $json_genre = file_get_contents($rakuten_url_genre);
        $arr_genre = json_decode($json_genre,true);

        $gen = new Func();
        $gen->genre($arr_genre);

    })->everyMinute()->runInBackground();






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
