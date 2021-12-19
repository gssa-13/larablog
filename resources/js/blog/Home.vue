<template>
    <div id="main">
        <h3>Titulo</h3>
        <br>
        <article class="post" v-for="post in posts">
            <header>
                <div class="title">
                    <h2>
                        <a href="" v-text="post.title"></a>
                    </h2>
                    <br>
                    <a style="color: inherit; font-size: inherit;" v-for="tag in post.tags"
                       href="javascript:void(0);">
                        #{{ tag.name}}
                    </a>

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
            <br>
            <p v-text="post.excerpt"></p>
            <footer>
                <ul class="actions">
                    <li>
                        <a href="javascript:void(0);" class="button large">Leer mas</a>
                    </li>
                </ul>
                <ul class="stats">
                    <li>
                        <a style="color: inherit; font-size: inherit;" href="javascript:void(0)"
                           v-text="post.category.name"></a>
                    </li>
                    <li><a href="javascript:void(0);" class="icon solid fa-heart">28</a></li>
                    <li><a href="javascript:void(0);" class="icon solid fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
        <!--    No hay post que mostrar    -->
        <article class="post" v-if="! posts.length">
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
    data(){
        return {
            posts: []
        }
    },
    mounted() {
        axios.get('/api/posts')
        .then(response => {
            this.posts = response.data.data;
        })
        .catch(errors => {
            console.log(errors);
        });
    }
}
</script>
