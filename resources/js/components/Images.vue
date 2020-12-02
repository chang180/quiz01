<template>
<div class="text-center py-2 border-bottom my-1">校園映像區</div>
<div class="up" @click="switchImg('up')"></div>
    <div class="img" v-for="img of images.data" v-show="img.show" :key="img.id"><img :src="img.img" class="mx-auto"></div>
    <div class="down" @click="switchImg('down')"></div>
</template>
<script>
export default {
    props:['images'],
    setup(props){

const switchImg=(type)=>{
let imgs = props.images.data
            let page = props.images.page

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
            props.images.data = imgs
            props.images.page = page
}
return { switchImg}
    },
}
</script>