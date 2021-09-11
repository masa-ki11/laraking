<?php

namespace App\Http\Controllers;
use App\Models\rakuten_item;
use App\Models\rakuten;
// use Illuminate\Http\Request;
use RakutenRws_Client;
use Illuminate\Support\Facades\DB;
use Request;
class rakuten_itemsController extends Controller
{
    public function index (Request $request) 
    {
        $model = 'App\Models\rakuten_item';
        // dd($response);
        // DB::table('tests')->insert([
        //     'title' => 'testa',
        // ]);
        $date = $request::all();
        // dd($date);
        if (!empty($date['from'])){
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $rakuten = $model::whereDate('created_at', $date['from'])->get();
            
        } else {
            //リクエストデータがなければそのままで表示
            $rakuten = $model::whereDate('created_at', DB::raw('CURDATE()'))->get();
        }
        
    
        return view('index', compact('rakuten'));
    }

    public function select(Request $request) 
    {
        session_start();
        
        $data = $request::all();
        if (!empty($data['genre'])){
            $_SESSION['genre'] = ($data['genre']);
            // dd($_SESSION['genre']);
        }
        // dd($_SESSION['genre']);
        switch ($_SESSION['genre']) {
            case 'レディースファッション':
                $model = 'App\Models\rakuten';
            case 'メンズファッション':
                $model = 'App\Models\rakuten';
            case '靴':
            
        }
        
        if (!empty($data['from'])){
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $rakuten = $model::whereDate('created_at', $data['from'])->get();
    
        } else {
            //リクエストデータがなければそのままで表示
            $rakuten = $model::whereDate('created_at', DB::raw('CURDATE()'))->get();
        }
        // dd($rakuten);
        return view('select', compact('rakuten'));
    
    }
    
    public function search(Request $form_text)
        {
            $keyword = $form_text::all();
            if(!empty($keyword['textbox'])){
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

            }else{
                return redirect('/index');
            }
        
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
