<template>
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2>
                        <a v-text="post.title"></a>
                    </h2>
                    <br>
<!--                    <a style="color: inherit; font-size: inherit;" v-for="tag in post.tags"-->
<!--                       href="javascript:void(0)">-->
<!--                        #{{ tag.name }}-->
<!--                    </a>-->
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01" v-text="post.published_date"></time>
                    <a href="javascript:void(0);" class="author">
                        <span class="name" v-text="post.user_id"></span>
                    </a>
                    <a href="javascript:void(0);" class="author">
                        <img src="/images/avatar.jpg" alt="" />
                    </a>
                </div>
            </header>
<!--            @if( $post->photos->count() === 1)-->
            <span class="image featured">
<!--                    <img src="{{ $post->photos->first()->url }}" alt="" />-->
                </span>
<!--            @elseif( $post->photos->count() > 1)-->
<!--            @include('blog.carousel')-->
<!--            @endif-->
            <br>
            <content v-html="post.content"></content>
            <footer>
                <ul class="stats">
                    <li>
                        <a style="color: inherit; font-size: inherit;" href="javascript:void(0)">
                            {{ post.category_id }}
                        </a>
                    </li>
                    <li><a href="javascript:void(0);" class="icon solid fa-heart">28</a></li>
                    <li><a href="javascript:void(0);" class="icon solid fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
    </div>
</template>

<script>
export default {
    data() {
        return {
            post: {}
        }
    },
    mounted() {
        axios.get(`/api/blog/${this.$route.params.url}`)
        .then(response => {
            this.post = response.data;
        })
        .catch(error => {
            console.log(error.response.data)
        });
    }
}
</script>
