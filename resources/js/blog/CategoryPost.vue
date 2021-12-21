<template>
    <posts-list :posts="posts"></posts-list>
</template>

<script>
export default {
    props: ['category'],
    data(){
        return {
            posts: []
        }
    },
    mounted() {
        axios.get(`/api/categories/${this.category}`)
            .then(response => {
                this.posts = response.data.data;
            })
            .catch(errors => {
                console.log(errors);
            });
    }
}
</script>
