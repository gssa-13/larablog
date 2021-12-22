<template>
    <ul class="actions pagination" v-if="pagination.last_page > 1">
        <li v-for="page in pagination.last_page">
            <router-link :class="getActiveClass(page)" class="button large previous" :to="{
                    name: $route.name,
                    query: {
                        page: page
                    }
                }">
                {{ page }}
            </router-link>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['pagination'],
        methods: {
            getActiveClass(page) {
                return [
                    ! this.$route.query.page && page === 1 ? 'header-active' : ''
                ]
            }
        }
    }
</script>
