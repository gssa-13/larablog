<template>
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="javascript:void(0);">404 Not Found</a></h2>
                    <p>
                        <a href="javascript:void(0);">#ooops</a>
                    </p>
                </div>
                <div class="meta">
                    <time class="published" datetime="2022-01-01"></time>
                    <a href="javascript:void(0);" class="author">
                        <span class="name">System</span>
                        <img src="/images/avatar.jpg" alt="" />
                    </a>
                </div>
            </header>


            <content>
                El contenido que estas buscando no esta por aqui
                <br>

                <router-link :to="{name: 'home'}">
                    Regresar al inicio
                </router-link>
            </content>

        </article>
    </div>
</template>
