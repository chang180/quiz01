@extends('home')

@section('center')
    <h5 class="text-center py-2 border-bottom">更多最新消息</h5>
    <ul class="list-group mt-2">
        @foreach ($news as $key => $new)
            <li class="list-group-item list-group-item-action p-1 news">{{ $key + 1 }}
                .{{ mb_substr($new->text, 0, 20, 'utf8') }}...
                <div
                    class="border border-success text-white rounded-shadow bg-secondary offset-3 d-none position-absolute w-100 text-5">
                    <pre class="text-white">{{ $new->text }}</pre>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $news->links() }}

    <news :news="news" route="news"></news>
@endsection
