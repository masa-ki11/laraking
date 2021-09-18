<nav class="navbar navbar-expand-lg navbar-light pl-5 pr-5 pt-2 pb-2 ">
  <a class="navbar-brand text-white" href="/index">Laraking</a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
    <span class="navbar-toggler-icon"></span>
  </button>


  
  <div class="collapse navbar-collapse" id="Navber">
    <div class="navbar-nav">

      <div class="dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          楽天市場
        </a>
        
        
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <form action="{{ url('/select')}}" method="post" name="form1" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="レディースファッション">
                <a href="javascript:form1.submit()">レディースファッション</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form2" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="メンズファッション">
                <a href="javascript:form2.submit()">メンズファッション</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form3" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="インナー・下着・ナイトウェア">
                <a href="javascript:form3.submit()">インナー・下着・ナイトウェア</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form4" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="バッグ・小物・ブランド雑貨">
                <a href="javascript:form4.submit()">バッグ・小物・ブランド雑貨</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form5" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="靴">
                <a href="javascript:form5.submit()">靴</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form6" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="腕時計">
                <a href="javascript:form6.submit()">腕時計</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form7" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="ジュエリー・アクセサリー">
                <a href="javascript:form7.submit()">ジュエリー・アクセサリー</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form8" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="食品">
                <a href="javascript:form8.submit()">食品</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form9" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="スイーツ・お菓子">
                <a href="javascript:form9.submit()">スイーツ・お菓子</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form10" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="水・ソフトドリンク">
                <a href="javascript:form10.submit()">水・ソフトドリンク</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form11" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="ビール・洋酒">
                <a href="javascript:form11.submit()">ビール・洋酒</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form12" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="ワイン">
                <a href="javascript:form12.submit()">ワイン</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form13" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="日本酒・焼酎">
                <a href="javascript:form13.submit()">日本酒・焼酎</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form14" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="日用品雑貨・文房具・手芸">
                <a href="javascript:form14.submit()">日用品雑貨・文房具・手芸</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form15" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="ダイエット・健康">
                <a href="javascript:form15.submit()">ダイエット・健康</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form16" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="医薬品・コンタクト・介護">
                <a href="javascript:form16.submit()">医薬品・コンタクト・介護</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form17" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="美容・コスメ・香水">
                <a href="javascript:form17.submit()">美容・コスメ・香水</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form18" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="キッズ・ベビー・マタニティ">
                <a href="javascript:form18.submit()">キッズ・ベビー・マタニティ</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form19" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="おもちゃ">
                <a href="javascript:form19.submit()">おもちゃ</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form20" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="家電">
                <a href="javascript:form20.submit()">家電</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form21" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="TV・オーディオ・カメラ">
                <a href="javascript:form21.submit()">TV・オーディオ・カメラ</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form22" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="スマートフォン・タブレット">
                <a href="javascript:form22.submit()">スマートフォン・タブレット</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form23" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="パソコン・周辺機器">
                <a href="javascript:form23.submit()">パソコン・周辺機器</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form24" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="スポーツ・アウトドア">
                <a href="javascript:form24.submit()">スポーツ・アウトドア</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form25" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="車用品・バイク用品">
                <a href="javascript:form25.submit()">車用品・バイク用品</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form26" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="インテリア・寝具・収納">
                <a href="javascript:form26.submit()">インテリア・寝具・収納</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form27" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="キッチン用品・食器・調理器具">
                <a href="javascript:form27.submit()">キッチン用品・食器・調理器具</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form28" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="ペット・ペットグッズ">
                <a href="javascript:form28.submit()">ペット・ペットグッズ</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form29" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="花・ガーデン・DIY">
                <a href="javascript:form29.submit()">花・ガーデン・DIY</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form30" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="サービス・リフォーム">
                <a href="javascript:form30.submit()">サービス・リフォーム</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form31" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="テレビゲーム">
                <a href="javascript:form31.submit()">テレビゲーム</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form32" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="ホビー">
                <a href="javascript:form32.submit()">ホビー</a>
            </form>
            <form action="{{ url('/select')}}" method="post" name="form33" class="form-inline my-2 my-lg-0 ml-2">
              {{ csrf_field() }}
                <input type="hidden" name="genre" value="楽器・音響機器">
                <a href="javascript:form33.submit()">楽器・音響機器</a>
            </form>
          </div>
          
        
      </div>

    </div>
    <form action="{{ url('/search')}}" method="post" class="form-inline my-2 my-lg-0 ml-auto">
      {{ csrf_field() }}
      <input type="text" name="textbox" class="form-control mr-sm-2" placeholder="キーワードを入力" aria-label="検索...">
      <input type="submit" value="検索">
    </form>
    
  </div>
</nav>

