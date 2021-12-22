<template>
    <div id="main">
        <article class="post">
            <post-header :post="post"></post-header>
            <content v-html="post.content"></content>
            <post-footer :post="post" :show_button="false"></post-footer>
        </article>
    </div>
</template>

<script>
export default {
    props: ['url'],
    data() {
        return {
            post: {
                user: {},
                category: {},

            }
        }
    },
    mounted() {
        axios.get(`/api/blog/${this.url}`)
        .then(response => {
            this.post = response.data;
        })
        .catch(error => {
            console.log(error.response.data)
        });
    }
}
</script>
