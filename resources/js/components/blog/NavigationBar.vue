<template>
    <header id="header">
        <h1>
            <router-link :to="{name: 'home'}">
                Lara-blog
            </router-link>
        </h1>
        <nav class="links">
            <ul>
                <li>
                    <router-link :to="{name:'about'}">
                        Acerca de Nosotros
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'archive'}">
                        Archivo
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'contact'}">
                        Contactanos
                    </router-link>
                </li>
            </ul>
        </nav>
        <nav class="main">
            <ul>
                <li class="search">
                    <a class="fa-search" href="#search">Search</a>
                    <form id="search" method="get" action="#">
                        <input type="text" name="query" placeholder="Search"/>
                    </form>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
        </nav>
    </header>
</template>
