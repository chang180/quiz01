@extends('home')

@section('center')
    <div class="mvims h-50">
        {{-- @foreach ($mvims as $mv)
            --}}

            <div v-for="mv of mvims" v-show="mv.show" class="mv text-center">
                <img :src="mv.img" class="mx-auto">
            </div>
            {{--
        @endforeach --}}
    </div>
    <div class="h-25">
        <div class="text-center py-2 border-bottom my-1">最新消息區
            {{-- @isset($more) --}}
            <a class="float-right" :href="newss.more.href" v-if="newss.more.show">More...</a>
            {{-- @endisset --}}
        </div>
        <ul class="list-group">
            {{-- @foreach ($news as $key => $new)
                --}}
                <li class="list-group-item list-group-item-action p-1 news" v-for="news of newss.data"
                    @mouseover="news.show=true" @mouseleave="news.show=false">@{{ news . short }}...
                    <div class="border border-dark rounded-shadow text-white offset-4 w-75 bg-secondary text-5 position-absolute"
                        v-show="news.show" v-html="news.text"></div>
                </li>
                {{--
            @endforeach --}}
        </ul>
    </div>
@endsection

@section('script')
    <script>
        const app = {
            data() {
                const site = JSON.parse('{!!  json_encode($site) !!}')

                const menus = JSON.parse('{!!  $menus !!}')
                const images = JSON.parse('{!!  json_encode($images) !!}')
                // const currentPage = 0
                const mvims = JSON.parse('{!!  $mvims !!}')
                const newss = JSON.parse('{!!  json_encode($news) !!}')
                return {
                    menus,
                    images,
                    mvims,
                    newss,
                    site,
                }
            },
            mounted() {
                this.switchImg('up')
                let m = 1
                setInterval(() => {

                    this.mvims.map((mv, idx) => {
                        // if (idx == m) {
                        //     mv.show = true
                        // } else {
                        //     mv.show = false
                        // }
                        mv.show = (idx == m) ? true : false
                        return mv
                    })
                    m = (m + 1) % this.mvims.length
                }, 3000)
            },
            methods: {
                switchImg(type) {
                    let imgs = this.images.data
                    let page = this.images.page

                    switch (type) {
                        case 'up':
                            page = (page > 0) ? page - 1 : page
                            break
                        case 'down':
                            page = (page < imgs.length - 3) ? page + 1 : page
                            break
                    }
                    imgs.map((img, idx) => {
                        if (idx >= page && idx <= page + 2) {
                            img.show = true
                        } else {
                            img.show = false
                        }
                        // console.log(page,this.images.length)
                        return img
                    })
                    this.images.data = imgs
                    this.images.page = page
                }
            }
        }

        Vue.createApp(app).mount('#app')


        //原jQuery寫法，可完全用Vue的方式取代

        // let num = $(".img").length;
        // let p = 0;



        // $(".img").each((idx, dom) => {
        //     if (idx < 3) {
        //         $(dom).show()
        //     }
        // })

        // $(".up,.down").on("click", function() {
        //     $(".img").hide()
        //     switch ($(this).attr('class')) {
        //         case 'up':
        //             p = (p > 0) ? --p : p;
        //             break;
        //         case 'down':
        //             p = (p < num - 3) ? ++p : p;
        //             break;
        //     }
        //     $(".img").each((idx, dom) => {
        //         if (idx >= p && idx <= p + 2) {
        //             $(dom).show()
        //         }
        //     })

        // })

        // $('.menu').hover(
        //     function() {
        //         $(this).children('.subs').removeClass('d-none');
        //     },
        //     function() {
        //         $(this).children('.subs').addClass('d-none');
        //     }
        // );

        // $(".mv").eq(0).removeClass('d-none')
        // let mvNum = $(".mv").length
        // let now = 0

        // setInterval(() => {
        //     ++now
        //     $(".mv").addClass('d-none')
        //     now = now % mvNum
        //     $(".mv").eq(now).removeClass('d-none')

        // }, 3000);

        // $(".news").hover(
        //     function() {
        //         $(this).children('div').removeClass('d-none')
        //     },
        //     function() {
        //         $(this).children('div').addClass('d-none')

        //     }
        // )

    </script>
@endsection
