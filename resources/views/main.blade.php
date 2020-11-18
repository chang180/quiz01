@extends('home')

@section("center")
<div class="mvims h-50">
{{-- @foreach($mvims as $mv) --}}

<div v-for="mv of mvims" v-show="mv.show" class="mv text-center">
    <img :src="mv.img" class="mx-auto">
</div>
{{-- @endforeach --}}
</div>
<div class="h-25">
    <div class="text-center py-2 border-bottom my-1">最新消息區
{{-- @isset($more) --}}
    <a class="float-right" href="">More...</a>
{{-- @endisset --}}
    </div>
    <ul class="list-group">
        {{-- @foreach($news as $key=>$new) --}}
        <li class="list-group-item list-group-item-action p-1 news" v-for="news of newss" @mouseover="news.show=true" @mouseleave="news.show=false">@{{ news.short }}... 
        <div class="border border-dark rounded-shadow text-white offset-4 w-75 bg-secondary text-5 position-absolute" v-show="news.show" v-html="news.text"></div>
        </li>
        {{-- @endforeach --}}
    </ul>
</div>
@endsection