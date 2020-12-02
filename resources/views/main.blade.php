@extends('home')

@section('center')
    <div class="mvims h-50">

        <div v-for="mv of mvims" v-show="mv.show" class="mv text-center">
            <img :src="mv.img" class="mx-auto">
        </div>
    </div>
    <div class="h-25">
        <div class="text-center py-2 border-bottom my-1">最新消息區
            <a class="float-right" :href="newss.more.href" v-if="newss.more.show">More...</a>
        </div>
        <ul class="list-group">
            <li class="list-group-item list-group-item-action p-1 news" v-for="news of newss.data"
                @mouseover="news.show=true" @mouseleave="news.show=false">@{{ news . short }}...
                <div class="border border-dark rounded-shadow text-white offset-4 w-75 bg-secondary text-5 position-absolute"
                    v-show="news.show" v-html="news.text"></div>
            </li>
        </ul>
    </div>
@endsection


