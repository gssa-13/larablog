<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>@yield('title', config('app.name')." | Blog")</title>
        <meta name="description" content="@yield('meta-description', 'Este es el blog de '.config('app.name'))" />
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="/css/main.css" />
        @stack('css_after')
    </head>
    <body class="is-preload">
        <div id="app">
            <!-- Wrapper -->
            <div id="wrapper">

            @include('layouts.blog.header')

            <!-- Menu -->
                <section id="menu">

                    <!-- Search -->
                    <section>
                        <form class="search" method="get" action="#">
                            <input type="text" name="query" placeholder="Search" />
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

                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/browser.min.js"></script>
        <script src="/js/breakpoints.min.js"></script>
        <script src="/js/util.js"></script>
        <script src="/js/main.js"></script>
        @stack('js_after')
    </body>
</html>
