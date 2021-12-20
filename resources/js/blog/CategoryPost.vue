<template>
    <posts-list :posts="posts"></posts-list>
</template>

<script>
export default {
    data(){
        return {
            posts: []
        }
    },
    mounted() {
        axios.get(`/api/categories/${this.$route.params.category}`)
            .then(response => {
                this.posts = response.data.data;
            })
            .catch(errors => {
                console.log(errors);
            });
    }
}
</script>
