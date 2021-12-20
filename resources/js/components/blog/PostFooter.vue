<template>
    <footer>
        <ul class="actions" v-if="show_button">
            <li>
                <router-link class="button large" :to="{name: 'post_show', params:{url: post.url}}">
                    Leer mas
                </router-link>
            </li>
        </ul>
        <ul class="stats">
            <li>
                <router-link style="color: inherit; font-size: inherit;"
                :to="{name: 'category_posts', params: { category: post.category.url } }">
                    {{ post.category.name }}
                </router-link>
            </li>
            <li><a href="javascript:void(0);" class="icon solid fa-heart">28</a></li>
            <li><a href="javascript:void(0);" class="icon solid fa-comment">128</a></li>
        </ul>
    </footer>
</template>

<script>
    export default {
        props: ['post', 'show_button']
    }
</script>
