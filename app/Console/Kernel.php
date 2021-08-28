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
            DB::table('tests')->insert([
                'title' => 'testa',
            ]);
            // })->daily();
                    
        $rakuten_apikey = config('app.rakuten_id');
        $client = new RakutenRws_Client();
        $client->setApplicationId($rakuten_apikey);
        $response = $client->execute('IchibaItemSearch', array(
            'keyword' => 'ブランド'
        ));

        if ($response->isOk()) {
            foreach($response as $item){
            DB::table('rakuten_items')->insert([
                // 'title' => $item['title'],
                // 'rank' => $item['rank'],
                'title' => 'title',
                'rank' => 10,
                'itemName' => $item['itemName'],
                'itemUrl' => $item['itemUrl'],
                'affiliateUrl' => $item['affiliateUrl'],
                'itemPrice' => $item['itemPrice'],
                'reviewCount' => $item['reviewCount'],
                'reviewAverage' => $item['reviewAverage'],
                'imageFlag' => $item['imageFlag'],
                'smallImageUrls' => $item['smallImageUrls'][0]['imageUrl'],
                'shopName' => $item['shopName'],
                'shopUrl' => $item['shopUrl'],
                'genreId' => (int)$item['genreId'],
                'created_at' => date("Y/m/d H:i:s")
            ]);
        }
        } else {
            echo 'Error:'.$response->getMessage();
        }

        })->everyMinute()
        ->runInBackground();
        
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
