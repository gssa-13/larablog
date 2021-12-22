<template>
    <div id="main">
        <h3>Titulo</h3>
        <br>
        <post-list-item v-for="post in items" :post="post" :key="post.id"></post-list-item>
        <!--    No hay post que mostrar    -->
        <article class="post" v-if="! items.length">
            <header>
                <div class="title">
                    <h2>Sin publicaciones</h2>
                    <br>
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01">
                    </time>
                    <a href="javascript:void(0);" class="author">
                        <span class="name">System</span>
                    </a>
                    <a href="javascript:void(0);" class="author">
                        <img src="/images/avatar.jpg" alt="" />
                    </a>
                </div>
            </header>
            <br>
            Aun no hay publicaciones
            <footer></footer>
        </article>
    </div>
</template>

<script>
    export default {
        props: ['items']
    }
</script>
