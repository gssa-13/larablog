<template>
    <article class="post">
        <post-header :post="post"></post-header>
        <!--            @if( $post->photos->count() === 1)-->
        <span class="image featured">
        <!--                    <img src="{{ $post->photos->first()->url }}" alt="" />-->
                        </span>
        <!--            @elseif( $post->photos->count() > 1)-->
        <!--            @include('blog.carousel')-->
        <!--            @endif-->
        <br>
        <p v-text="post.excerpt"></p>
        <post-footer :post="post" :show_button="true"></post-footer>
    </article>
</template>

<script>
    export default {
        props: ['post']
    }
</script>
