<template>
    <router-link style="color: inherit; font-size: inherit;"
                 :to="{ name: 'category_posts', params: { category: category.url } }">
        {{ category.name }}
    </router-link>
</template>

<script>
    export default {
        props: ['category']
    }
</script>
