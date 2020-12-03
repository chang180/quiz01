<template>
  <div class="h-25">
    <div class="text-center py-2 border-bottom my-1">
      {{ title }}
      <a class="float-right" :href="news.more.href" v-if="news.more.show"
        >More...</a
      >
    </div>
    <ul class="list-group">
      <li
        class="list-group-item list-group-item-action p-1 news"
        v-for="(ns,idx) of news.data"
        @mouseover="ns.show = true"
        @mouseleave="ns.show = false"
        :key="ns.id"
      >
        {{idx+1 }}.{{ ns.short }}...
        <div
          class="border border-dark rounded-shadow text-white offset-4 w-75 bg-secondary text-5 position-absolute"
          v-show="ns.show"
          v-html="ns.text"
        ></div>
      </li>
    </ul>
  </div>
</template>
<script>
import { onMounted, ref } from "vue";
export default {
  props: ["news", "route"],
  setup(props) {
    console.log(props.news);
    const title = ref("最新消息");
    onMounted(() => {
      switch (props.route) {
        case "index":
          title.value = "最新消息區";
          break;
        case "news":
          title.value = "更多最新消息";
          props.news.more.show=false
          break;
      }
    });

    return { title,props };
  },
};
</script>