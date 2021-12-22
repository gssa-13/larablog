<template>
    <div>
        <component :is="componentName" :items="items"></component>
        <pagination-link :pagination="pagination" />
    </div>
</template>

<script>
    export default {
        props: ['url', 'componentName'],
        data() {
            return {
                pagination: {},
                items: []
            }
        },
        mounted() {
            axios.get(`${this.url}?page=${this.$route.query.page || 1}`)
                .then(response => {
                    this.pagination = response.data;
                    this.items = response.data.data;
                    delete this.pagination.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        }
    }
</script>

<style lang="css">
    .pagination a {
        background-color: #FFFFFF;
    }
    .pagination a.header-active {
        box-shadow: inset 0 0 0 1px #2ebaae;
        color: #2EBAAE !important;
    }
</style>
