ohno
<br>
ランキングタイトル:

<br>

取得した日付:


<br>
@foreach($response as $item)
<br>

<br>
商品名:※後ほど、アフィリエイトURLに変更予定
<br>
<a href="{{ $item['itemUrl'] }}">
{{ $item['itemName'] }}
</a>
<br>
価格:
{{ $item['itemPrice'] }}
円
<br>
レビュー数:
{{ $item['reviewCount'] }}
<br>
レビュー平均:
{{ $item['reviewAverage'] }}
<br>
画像:
<img src="{{ $item['smallImageUrls'][0]['imageUrl'] }}" alt="">

<br>
順位:

<br>




<br>
<br>
@endforeach
画像 -->