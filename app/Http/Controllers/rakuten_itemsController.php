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
            $date['from'] = date('Y-m-d');
        }
        
        
        return view('index', compact('rakuten', 'date'));
    }

    public function select(Request $request) 
    {
        session_start();
        
        $data = $request::all();
        if (!empty($data['genre'])){
            $_SESSION['genre'] = ($data['genre']);
            // dd($_SESSION['genre']);
        }
        $data['genre'] = $_SESSION['genre'];
        // dd($data['genre']);
        switch ($_SESSION['genre']) {
            case 'レディースファッション':
                $model = 'App\Models\Ladies_fashion';
                break;
            case 'メンズファッション':
                $model = 'App\Models\Mens_fashion';
                break;
            case 'インナー・下着・ナイトウェア':
                $model = 'App\Models\Inner';
                break;
            case 'バッグ・小物・ブランド雑貨':
                $model = 'App\Models\Bag';
                break;
            case '靴':
                $model = 'App\Models\Shoes';
                break;
            case '腕時計':
                $model = 'App\Models\Watch';
                break;
            case 'ジュエリー・アクセサリー':
                $model = 'App\Models\Jewelry';
                break;
            case '食品':
                $model = 'App\Models\Food';
                break;
            case 'スイーツ・お菓子':
                $model = 'App\Models\Snack';
                break;
            case '水・ソフトドリンク':
                $model = 'App\Models\Water';
                break;
            case 'ビール・洋酒':
                $model = 'App\Models\Beer';
                break;
            case 'ワイン':
                $model = 'App\Models\Wine';
                break;
            case '日本酒・焼酎':
                $model = 'App\Models\Sake';
                break;
            case '日用品雑貨・文房具・手芸':
                $model = 'App\Models\Stationary';
                break;
            case 'ダイエット・健康':
                $model = 'App\Models\Diet';
                break;
            case '医薬品・コンタクト・介護':
                $model = 'App\Models\Pharmaceutical';
                break;
            case '美容・コスメ・香水':
                $model = 'App\Models\Beauty';
                break;
            case 'キッズ・ベビー・マタニティ':
                $model = 'App\Models\Kid';
                break;
            case 'おもちゃ':
                $model = 'App\Models\Toy';
                break;
            case '家電':
                $model = 'App\Models\Home_appliance';
                break;
            case 'TV・オーディオ・カメラ':
                $model = 'App\Models\Tv';
                break;
            case 'スマートフォン・タブレット':
                $model = 'App\Models\Smart_phone';
                break;
            case 'パソコン・周辺機器':
                $model = 'App\Models\Pc';
                break;
            case 'スポーツ・アウトドア':
                $model = 'App\Models\Sport';
                break;
            case '車用品・バイク用品':
                $model = 'App\Models\Car';
                break;
            case 'インテリア・寝具・収納':
                $model = 'App\Models\Interior';
                break;
            case 'キッチン用品・食器・調理器具':
                $model = 'App\Models\Kitchenware';
                break;
            case 'ペット・ペットグッズ':
                $model = 'App\Models\Pet';
                break;
            case '花・ガーデン・DIY':
                $model = 'App\Models\Flower';
                break;
            case 'サービス・リフォーム':
                $model = 'App\Models\Service';
                break;
            case 'テレビゲーム':
                $model = 'App\Models\Game';
                break;
            case 'ホビー':
                $model = 'App\Models\Hobby';
                break;
            case '楽器・音響機器':
                $model = 'App\Models\Instrument';
                break;

        }
        
        if (!empty($data['from'])){
            //ハッシュタグの選択された20xx/xx/xx ~ 20xx/xx/xxのレポート情報を取得
            $rakuten = $model::whereDate('created_at', $data['from'])->get();
    
        } else {
            //リクエストデータがなければそのままで表示
            $rakuten = $model::whereDate('created_at', DB::raw('CURDATE()'))->get();
            $data['from'] = date('Y-m-d');
        }
        // dd($rakuten);
        return view('select', compact('rakuten', 'data'));
    
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
