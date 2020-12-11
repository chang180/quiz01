require('./bootstrap');
import { createApp } from 'vue'
import Marquee from "./components/Marquee.vue"
import Images from "./components/Images.vue"
// import Mvims from "./components/Mvims.vue"
// import News from "./components/News.vue"
import Menus from "./components/Menus.vue"
import LoginBtn from "./components/LoginBtn.vue"
// import Login from "./components/Login.vue"
import router from './router.js'

const app = {
    components: {
        'marquee-replace': Marquee,
        'images': Images,
        // 'mvims': Mvims,
        // 'news': News,
        'menus': Menus,
        'login-btn': LoginBtn,
        // 'login': Login,
    },
    data() {

        return {
            menus: null,
            images: null,
            mvims: null,
            // news: null,
            site: null,
            show: false,
            auth: null,
        }
    },

    mounted() {
        axios.get("/api")
            .then((res) => {
                // console.log(res.data)
                this.site = res.data.site
                this.menus = res.data.menus
                this.images = res.data.images
                    // this.news = res.data.news
                this.mvims = res.data.mvims
                this.show = true
                this.auth = res.data.auth
                    // console.log(this.auth)
            })


    }
}

createApp(app).use(router).mount('#app')



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