<template>
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="javascript:void(0)">Archive</a></h2>
                    <p>
                        Eos incidunt qui quod laborum aliquam eius soluta vel.
                        Ut quia laudantium quo. Suscipit sint occaecati est ullam.
                        Quia magnam doloremque ut maxime veniam assumenda.
                        Non nihil adipisci expedita nesciunt dolorem.
                    </p>
                </div>
                <div class="meta">
                    <time class="published" datetime="2022-01-01">2022-01-01</time>
                    <a href="javascript:void(0);" class="author">
                        <span class="name">System</span>
                        <img src="/images/avatar.jpg" alt="" />
                    </a>
                </div>
            </header>
            <section>
                <div class="row">
                    <div class="col-6 col-12-medium">
                        <h3>Authors</h3>
                        <ul>
                            <li v-for="author in authors" v-text="author.name"></li>
                        </ul>
                        <br>
                        <br>
                        <h3>Categories</h3>
                        <ul class="alt">
                            <li v-for="category in categories">
                                <category-link :category="category"/>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-12-medium">
                        <h3>Posts</h3>
                        <ol>
                            <li v-for="post in posts">
                                <post-link :post="post">{{ post.title }}</post-link>
                            </li>
                        </ol>
                        <br>
                        <h3>Posts By Month</h3>
                        <ul class="dates">
                            <li class="text-capitalize" v-for="archive in archives">
                                <a href="javascript:void(0);">
                                    {{ archive.year }} {{ archive.monthname }} ({{ archive.posts }})
                                </a>
                            </li>
                            <li v-if="! archives.length">
                                <a href="javascript:void(0);">
                                    Aun no hay posts publicados
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </section>
            <br>
            <footer>
                <ul class="stats">
                    <li><a href="javascript:void(0);">Archive</a></li>
                    <li><a href="javascript:void(0);" class="icon solid fa-heart">28</a></li>
                    <li><a href="javascript:void(0);" class="icon solid fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                authors: [],
                categories: [],
                posts: [],
                archives: []
            }
        },
        mounted() {
            axios.get('/api/archive')
            .then(response => {
                this.authors = response.data.authors;
                this.categories = response.data.categories;
                this.posts = response.data.posts;
                this.archives = response.data.archives;
            })
            .catch(errors => {
                console.log(errors);
            });
        }
    }
</script>
