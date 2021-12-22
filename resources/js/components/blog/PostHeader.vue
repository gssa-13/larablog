<template>
    <header>
        <div class="title">
            <h2> <a v-text="post.title"></a> </h2>
            <br>
            <router-link class="mr-1" style="color: inherit; font-size: inherit;"
                :to="{name: 'tag_posts', params: { tag: tag.url}}" :key="post.id+'-'+tag.id"
                 v-for="tag in post.tags">
                #{{ tag.name }}
            </router-link>
        </div>
        <div class="meta">
            <time class="published" datetime="2015-11-01" v-text="post.published_date"></time>
            <a href="javascript:void(0);" class="author">
                <span class="name" v-text="post.user.name"></span>
            </a>
            <a href="javascript:void(0);" class="author">
                <img src="/images/avatar.jpg" alt="" />
            </a>
        </div>
    </header>
</template>

<script>
    export default {
        props: ['post']
    }
</script>
