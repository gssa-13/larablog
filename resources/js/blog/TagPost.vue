<template>
    <posts-list :posts="posts"></posts-list>
</template>

<template>
    <paginator :url="`/api/tags/${this.tag}`" component-name="posts-list" />
</template>


<script>
export default {
    props: ['tag']
}
</script>
