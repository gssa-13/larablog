<template>
    <posts-list :posts="posts"></posts-list>
</template>

<script>
export default {
    props: ['tag'],
    data(){
        return {
            posts: []
        }
    },
    mounted() {
        axios.get(`/api/tags/${this.tag}`)
        .then(response => {
            this.posts = response.data.data;
        })
        .catch(errors => {
            console.log(errors);
        });
    }
}
</script>
