<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>@yield('title', config('app.name')." | Blog")</title>
    <meta name="description" content="@yield('meta-description', 'Este es el blog de '.config('app.name'))"/>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
</head>
<body class="is-preload">
<div id="app">
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <h1>
                <router-link to="/home">{{ config('app.name') }}</router-link>
            </h1>
            <nav class="links">
                <ul>
                    <li>
                        <router-link to="/about">{{ __('blog.about') }}</router-link>
                    </li>
                    <li>
                        <router-link to="/archive">{{ __('blog.archive') }}</router-link>
                    </li>
                    <li>
                        <router-link to="/contact">{{ __('blog.contact') }}</router-link>
                    </li>
                </ul>
            </nav>
            <nav class="main">
                <ul>
                    <li class="search">
                        <a class="fa-search" href="#search">Search</a>
                        <form id="search" method="get" action="#">
                            <input type="text" name="query" placeholder="Search" />
                        </form>
                    </li>
                    <li class="menu">
                        <a class="fa-bars" href="#menu">Menu</a>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- /. Header -->

    <!-- Menu -->
        <section id="menu">

            <!-- Search -->
            <section>
                <form class="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search"/>
                </form>
            </section>

            <!-- Links -->
            <section>
                <ul class="links">
                    <li>
                        <a href="#">
                            <h3>Lorem ipsum</h3>
                            <p>Feugiat tempus veroeros dolor</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Dolor sit amet</h3>
                            <p>Sed vitae justo condimentum</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Feugiat veroeros</h3>
                            <p>Phasellus sed ultricies mi congue</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Etiam sed consequat</h3>
                            <p>Porta lectus amet ultricies</p>
                        </a>
                    </li>
                </ul>
            </section>

            <!-- Actions -->
            <section>
                <ul class="actions stacked">
                    <li><a href="{{route('login')}}" class="button large fit">{{__('tag.log_in')}}</a></li>
                </ul>
            </section>

        </section>
        <!-- Main -->
        <div id="main">
            {{--
            @if( isset($title) )
                <h3>{{ $title }}</h3>
            @endif
            --}}
            <br>

            {{-- @forelse($posts as $post) --}}
        <!-- Post -->
            <article class="post">
                {{-- @include('blog.partials.header-post') --}}

                {{--
                @if( $post->photos->count() === 1)
                    <a href="{{ route('blog.show', $post) }}" class="image featured">
                <img src="{{ Storage::disk('posts')->url($post->photos->first()->url) }}" alt=""/>
                </a>
                @elseif( $post->photos->count() > 1 )
                    @include('blog.carousel')
                @endif
                --}}
                <br>
                <p>{{-- $post->excerpt --}}</p>
                <router-view></router-view>
                <footer>
                    {{--
                    <ul class="actions">
                        <li>
                            <a href="{{ route('blog.show', $post) }}" class="button large">
                                {{__('blog.read_more')}}
                            </a>
                        </li>
                    </ul>
                    @include('blog.partials.footer-stats')
                    --}}
                </footer>
            </article>

            {{-- @empty --}}
            <article class="post">
                <header>
                    <div class="title">
                        <h2>Sin publicaciones</h2>
                        <br>
                    </div>
                    <div class="meta">
                        <time class="published" datetime="2015-11-01">
                            {{-- now() --}}
                        </time>
                        <a href="javascript:void(0);" class="author">
                            <span class="name">System</span>
                        </a>
                        <a href="javascript:void(0);" class="author">
                            <img src="/images/avatar.jpg" alt=""/>
                        </a>
                    </div>
                </header>
                <br>
                Aun no hay publicaciones
                <footer></footer>
            </article>
            {{-- @endforelse --}}

        <!-- Pagination -->
            {{-- $posts->appends( request()->all() )->links() --}}

        </div>

    </div>
</div>

<!-- Scripts -->
<script src="{{ mix('/js/app.js') }}"></script>
<script src="/js/jquery.min.js"></script>
<script src="/js/browser.min.js"></script>
<script src="/js/breakpoints.min.js"></script>
<script src="/js/util.js"></script>
<script src="/js/main.js"></script>
<script src="/js/bootstrap.min.js"></script>

</body>
</html>


