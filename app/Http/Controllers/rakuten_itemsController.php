<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\rakuten_item;
// use Illuminate\Http\Request;
use RakutenRws_Client;
use Illuminate\Support\Facades\DB;
use Request;
class rakuten_itemsController extends Controller
{
    public function index () 
    {
        
        // dd($response);
        // DB::table('tests')->insert([
        //     'title' => 'testa',
        // ]);
        $rakuten = rakuten_item::get();
        $users = User::get();
        return view('index', compact('users', 'rakuten'));


        // $users = User::get();
        // $hello = \DB::table('Users')->get();
        
        // $hello_array = [\DB::table('Users')->get()];

        // return view('index', compact('users'));
    }

    public function search(Request $form_text)
        {
            $keyword = $form_text::all();
            // dd($keyword['textbox']);
        
            $rakuten_apikey = config('app.rakuten_id');

            $client = new RakutenRws_Client();
            // アプリID (デベロッパーID) をセットします
            $client->setApplicationId($rakuten_apikey);
            // dd(rakuten_id);
            // アフィリエイトID をセットします(任意)
            // $client->setAffiliateId('YOUR_AFFILIATE_ID');

            // IchibaItem/Search API から、keyword=うどん を検索します
            $response = $client->execute('IchibaItemSearch', array(
                'keyword' => $keyword['textbox']
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
            return view('search', compact('response', 'keyword'));
        }
}
