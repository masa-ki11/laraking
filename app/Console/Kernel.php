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
            // //総合ランキング
            $rakuten_apikey = config('app.rakuten_id');
            $aff_key = config('app.rakuten_aff_id');
            $rakuten_url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Ranking/20170628?applicationId=' 
            . $rakuten_apikey . '&affiliateId=' . $aff_key;
            $json = file_get_contents($rakuten_url);
            $arr = json_decode($json,true);
            $func = new Func();
            $func->sougou($arr);


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
        // })->daily();
        // })->everyTenMinutes()->runInBackground();
        // })->everyMinute()->runInBackground();
        })->cron('* * * * *');

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
