<template>
    <div class="text-center py-2 border-bottom my-1">主選單區</div>
    <ul class="list-group h-75">
        <li
            class="list-group-item list-group-action py-1 bg-warning menu"
            v-for="menu in menus"
            :key="menu.id"
            @mouseover="menu.show = true"
            @mouseleave="menu.show = false"
        >
            <router-link :to="menu.href">{{ menu.name }}</router-link>
            <ul
                v-if="menu.subs.length > 0"
                v-show="menu.show"
                class="list-group offset-4 w-75 subs position-absolute"
                style="z-index: 1"
            >
                <li
                    v-for="sub of menu.subs"
                    class="list-group-item list-group-action py-1 bg-success"
                    :key="sub.id"
                >
                    <router-link class="text-white" :to="sub.href">{{ sub.name }}</router-link>
                </li>
            </ul>
        </li>
    </ul>

    <div class="viewer mt-5 text-center">進站總人數：{{ total }}</div>
</template>
<script>
export default {
    props: ["menus", "total"],
};
</script>
