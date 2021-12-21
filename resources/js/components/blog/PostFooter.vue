<template>
    <footer>
        <ul class="actions" v-if="show_button">
            <li>
                <post-link class="button large"  :post="post">Leer mas</post-link>
            </li>
        </ul>
        <ul class="stats">
            <li>
                <category-link :category="post.category"/>
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
