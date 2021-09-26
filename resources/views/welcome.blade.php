<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laraking</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('stylesheet')
    </head>
    <body>
        <div class="home_image">
            <img alt="" class="img-fluid pc_image" src="/images/home.jpeg" >
            <img alt="" class="img-fluid mobile_image" src="/images/mobile.jpeg" >
            <div class="home_caption">
                <h2>いま、人気を見つけよう</h2>
                <h1>
                    <a href="/index"><font size="15"  face="ＭＳ Ｐ明朝,ＭＳ 明朝">laraking</font></a>
                </h1>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>



