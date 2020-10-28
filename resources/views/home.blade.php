@extends("layouts.layout")

@section('main')
    <div class="menu col-3">
        <div class="text-center py-2 border-bottom my-1">主選單區</div>
        @isset($menus)
            <ul class="list-group">
                @foreach ($menus as $menu)
                    <li class="list-group list-group-item-action py-1 bg-warning menu">
                        <a href="{{ $menu->href }}">
                            {{ $menu->name }}
                        </a>
                        @isset($menu->subs)
                            <ul class="list-group offset-4 w-75 subs d-none position-absolute">
                                @foreach ($menu->subs as $sub)
                                    <li class="list-group-item list-group-item-action bg-success"><a class="text-white"
                                            href="{{ $sub->href }}">{{ $sub->name }}</a></li>
                                @endforeach
                            </ul>
                        @endisset
                    </li>
                @endforeach
            </ul>
        @endisset
    </div>
    <div class="main col-6">
        @yield('center')
    </div>
    <div class="right col-3">
        <button class="btn btn-primary py-3 w-100">管理登入</button>
        <div class="text-center py-2 border-bottom my-1">校園映像</div>
        <div class="up"></div>
        @isset($images)
            @foreach ($images as $img)
                <div class="img"><img src="{{ asset('storage/' . $img->img) }}" alt=""></div>
            @endforeach
        @endisset
        <div class="down"></div>

    </div>
@endsection

@section('script')
    <script>
        let num = $(".img").length;
        let p = 0;
        $(".img").each((idx, dom) => {
            if (idx < 3) {
                $(dom).show()
            }
        })

        $(".up,.down").on("click", function() {
            $(".img").hide()
            switch ($(this).attr('class')) {
                case 'up':
                    p = (p > 0) ? --p : p;
                    break;
                case 'down':
                    p = (p < num - 3) ? ++p : p;
                    break;
            }
            $(".img").each((idx, dom) => {
                if (idx >= p && idx <= p + 2) {
                    $(dom).show()
                }
            })

        })

        $('.menu').hover(
            function() {
                // $(this).children('.subs').show();
                $(this).children('.subs').removeClass('d-none');
            },
            function() {
                $(this).children('.subs').addClass('d-none');
            }
        );

    </script>
@endsection
