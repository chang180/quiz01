@extends("layouts.layout")

@section('main')
    <div class="col-3">
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

<menus :menus="menus" :total="site.total" />
    </div>

    <div class="main col-6">
        <marquee-replace>@{{ site . ads }}</marquee-replace>
        @yield('center')
    </div>

    <div class="right col-3">
        <login-btn :auth="auth"></login-btn>

        {{-- @isset($images)
        @foreach ($images as $img)
            <div class="img"><img src="{{ asset('storage/' . $img->img) }}" alt=""></div>
        @endforeach
        @endisset --}}
        {{-- <div class="up" @click="switchImg('up')"></div> --}}
        <images :images="images"></images>
        {{-- <div class="down" @click="switchImg('down')"></div>
        --}}

    </div>
@endsection
