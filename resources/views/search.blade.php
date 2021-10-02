@extends('common.layout')

@section('content')



<main class="flex-grow">
    <div class="ranking-ribbon mt-4"><h2>『{{$keyword['textbox']}}』リアルタイム結果</h2></div>
    
    <?php $index=0; ?>
    @foreach($response as $item)
        <div class="fit-box overflow-hidden mt-4" data-item="b1426f" data-rank="1" id="b1426f">
            <div class="p-4">
                <h3 class="relative text-xl font-bold pl-16">
                @if($index == $index && $index != 0 && $index != 1 && $index != 2)
                    <strong class="ranking-num">
                        <span>{{$index+1}}</span>位
                    </strong>
                @elseif($index == 0)
                    <strong class="ranking-first">
                        <span>{{$index+1}}</span>位
                    </strong>
                @elseif($index == 1)
                    <strong class="ranking-second">
                        <span>{{$index+1}}</span>位
                    </strong>
                @elseif($index == 2)
                    <strong class="ranking-third">
                        <span>{{$index+1}}</span>位
                    </strong>
                @endif
                @if(!empty($item['affiliateUrl']))
                    <a href="{{ $item['affiliateUrl'] }}">
                @else
                    <a href="{{ $item['itemUrl'] }}">
                @endif
                    {{ $item['itemName'] }}
                    </a>
                </h3>
                <div class="d-flex sm:space-x-4 mt-4">
                    <div class="sm:flex-shrink-0">
                        <a target="_blank" href="/items/b1426f">
                        <img alt="" class="js-lozad w-60 h-60 object-cover max-w-full mx-auto" src="{{ $item['mediumImageUrls'][0]['imageUrl']}}" data-loaded="true"></a>
                        <p class="text-xs text-right mt-2">引用元: <a target="_blank" class="text-minran-blue underline" href="{{ $item['shopUrl'] }}">楽天市場</a></p>
                    </div>
                    <div class="sm:flex-grow ml-5">
                        <p class="text-break itemCaption js-textLimit" >
                            {{$item['itemCaption']}}
                        </p>
                        <table class="w-full text-xs mt-4 sm:mt-0">
                            <tbody>
                                <tr class="first:border-top border-bottom border-gray-200">
                                    <th class="w-24 md:w-40 text-left py-1">価格</th>
                                    <td class="py-1">{{ $item['itemPrice'] }}</td>
                                </tr>
                                <tr class="first:border-top border-bottom border-gray-200">
                                    <th class="w-24 md:w-40 text-left py-1">レビュー数</th>
                                    <td class="py-1">{{ $item['reviewCount'] }}</td>
                                </tr>
                                <tr class="first:border-top border-bottom border-gray-200">
                                    <th class="w-24 md:w-40 text-left py-1">レビュー平均</th>
                                    <td class="py-1">{{ $item['reviewAverage'] }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php $index++; ?>
    @endforeach
</main>
    
@endsection