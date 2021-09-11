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
          <form action="{{ url('/select')}}" method="post" name="form1" class="form-inline my-2 my-lg-0 ml-auto">
            {{ csrf_field() }}
              <input type="hidden" name="genre" value="レディースファッション">
              <a href="javascript:form1.submit()">レディースファッション</a>
          </form>
          <form action="{{ url('/select')}}" method="post" name="form2" class="form-inline my-2 my-lg-0 ml-auto">
            {{ csrf_field() }}
              <input type="hidden" name="genre" value="メンズファッション">
              <a href="javascript:form2.submit()">メンズファッション</a>
          </form>
          <form action="{{ url('/select')}}" method="post" name="form3" class="form-inline my-2 my-lg-0 ml-auto">
            {{ csrf_field() }}
              <input type="hidden" name="genre" value="靴">
              <a href="javascript:form3.submit()">靴</a>
          </form>
          <form action="{{ url('/select')}}" method="post" name="form4" class="form-inline my-2 my-lg-0 ml-auto">
            {{ csrf_field() }}
              <input type="hidden" name="genre" value="バッグ・小物・ブランド雑貨">
              <a href="javascript:form4.submit()">バッグ・小物・ブランド雑貨</a>
          </form>
            <a class="dropdown-item" href="/select" value="下着・ナイトウェア">下着・ナイトウェア</a>
            <a class="dropdown-item" href="/select" value="ジュエリー・アクセサリー">ジュエリー・アクセサリー</a>
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

