@extends("layouts.layout")

@section('main')
    <div class="col-3">
        <div class="text-center py-2 border-bottom my-1">主選單區</div>
        {{-- @isset($menus)
            <ul class="list-group h-50">
                @foreach ($menus as $menu)
                    <li class="list-group-item list-group-action py-1 bg-warning menu">
                        <a href="{{ $menu->href }}">
                            {{ $menu->name }}
                        </a>
                        @isset($menu->subs)
                            <ul class="list-group offset-4 w-75 subs d-none position-absolute" style="z-index:1">
                                @foreach ($menu->subs as $sub)
                                    <li class="list-group-item list-group-action py-1 bg-success"><a class="text-white"
                                            href="{{ $sub->href }}">{{ $sub->name }}</a></li>
                                @endforeach
                            </ul>
                        @endisset
                    </li>
                @endforeach
            </ul>
        @endisset --}}

        <ul class="list-group h-75">
            <li class="list-group-item list-group-action py-1 bg-warning menu" v-for="menu in menus" @mouseover='menu.show=true' @mouseleave="menu.show=false"><a
                    :href="menu.href">@{{ menu . name }}</a>
                <ul v-if="menu.subs.length>0" v-show="menu.show"class="list-group offset-4 w-75 subs position-absolute"
                    style="z-index:1">
                    <li v-for="sub of menu.subs" class="list-group-item list-group-action py-1 bg-success"><a class="text-white"
                    href="sub.href">@{{ sub.name }}</a></li>
                </ul>
            </li>
        </ul>

        <div class="viewer mt-5 text-center">
            進站總人數：@{{ total }}
        </div>
    </div>
    <div class="main col-6">
        <marquee>@{{ adstr }}</marquee>
        @yield('center')
    </div>
    <div class="right col-3">
        @auth
            <a href="/admin" class="btn btn-success py-3 w-100 my-2">返回管理 ({{ $user->acc }}) </a>
        @endauth
        @guest
            <a href="/login" class="btn btn-primary py-3 w-100 my-2">管理登入</a>
        @endguest
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
        const app = {
            data() {
                const adstr = '{{ $ads }}'
                const bottom = '{{ $bottom }}'
                const titleImg = '/storage/{{ $title->img }}'
                const title = '{{ $title->text }}'
                const total = '{{ $total }}'


                const menus = JSON.parse('{!!  $menus !!}')
                return {
                    adstr,
                    titleImg,
                    title,
                    bottom,
                    total,
                    menus
                }
            }
        }

        Vue.createApp(app).mount('#app')

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

        // $('.menu').hover(
        //     function() {
        //         $(this).children('.subs').removeClass('d-none');
        //     },
        //     function() {
        //         $(this).children('.subs').addClass('d-none');
        //     }
        // );

        $(".mv").eq(0).removeClass('d-none')
        let mvNum = $(".mv").length
        let now = 0

        setInterval(() => {
            ++now
            $(".mv").addClass('d-none')
            now = now % mvNum
            $(".mv").eq(now).removeClass('d-none')

        }, 3000);

        $(".news").hover(
            function() {
                $(this).children('div').removeClass('d-none')
            },
            function() {
                $(this).children('div').addClass('d-none')

            }
        )

    </script>
@endsection
