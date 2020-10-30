@extends('home')

@section("center")
<div class="mvims h-50">
@foreach($mvims as $mv)
<div class="mv text-center d-none">
    <img src="{{ asset("storage/".$mv->img) }}">
</div>
@endforeach
</div>
<div class="h-25">
    <div class="text-center py-2 border-bottom my-1">最新消息區
@isset($more)
    <a class="float-right" href="{{$more}}">More...</a>
@endisset
    </div>
    <ul class="list-group">
        @foreach($news as $key=>$new)
        <li class="list-group-item list-group-item-action p-1 news">{{$key+1}} .{{ mb_substr($new->text,0,20,'utf8') }}... 
        <div class="border border-success text-white rounded-shadow bg-secondary offset-3 d-none position-absolute w-100 text-5"> <pre class="text-white">{{$new->text}}</pre> </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection