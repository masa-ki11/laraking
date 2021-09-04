<nav class="navbar navbar-expand-lg navbar-light pl-5 pr-5 pt-2 pb-2 ">
  <a class="navbar-brand text-white" href="/index">Laraking</a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="Navber">
    <ul class="navbar-nav">
      <li class="nav-item ml-2">
        <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">楽天市場</a>
      </li>
      <li class="nav-item ml-2">
        <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Yahoo!ショッピング</a>
      </li>
      <li class="nav-item ml-2">
        <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Amazon</a>
      </li>
    </ul>
    <form action="{{ url('/search')}}" method="post" class="form-inline my-2 my-lg-0 ml-2">
      {{ csrf_field() }}
      <input type="text" name="textbox" class="form-control mr-sm-2" placeholder="キーワードを入力" aria-label="検索...">
      <input type="submit" value="検索">
    </form>

  </div>
</nav>

