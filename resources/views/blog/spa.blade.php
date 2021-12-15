@extends('layouts.blog')

@section('content')
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
                            <img src="/images/avatar.jpg" alt="" />
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

    <!-- Sidebar -->
    {{-- <section id="sidebar">

        <!-- Intro -->
        <section id="intro">
            <a href="javascript:void(0);" class="logo"><img src="/images/logo.jpg" alt=""/></a>
            <header>
                <h2>Future Imperfect</h2>
                <p>Another fine responsive site template by <a href="http://html5up.net">HTML5 UP</a></p>
            </header>
        </section>

        <!-- Mini Posts -->
        <section>
            <div class="mini-posts">

                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="{{ route('blog.show', $post) }}">Vitae sed condimentum</a></h3>
                        <time class="published" datetime="2022-01-01">October 20, 2015</time>
                        <a href="javascript:void(0);" class="author"><img src="/images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic04.jpg" alt="" /></a>
                </article>

                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="{{ route('blog.show', $post) }}">Rutrum neque accumsan</a></h3>
                        <time class="published" datetime="2022-01-19">October 19, 2015</time>
                        <a href="javascript:void(0);" class="author"><img src="/images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic05.jpg" alt="" /></a>
                </article>

                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="{{ route('blog.show', $post) }}">Odio congue mattis</a></h3>
                        <time class="published" datetime="2022-01-18">October 18, 2015</time>
                        <a href="javascript:void(0);" class="author"><img src="/images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic06.jpg" alt="" /></a>
                </article>

                <!-- Mini Post -->
                <article class="mini-post">
                    <header>
                        <h3><a href="{{ route('blog.show', $post) }}">Enim nisl veroeros</a></h3>
                        <time class="published" datetime="2022-01-17">October 17, 2015</time>
                        <a href="javascript:void(0);" class="author"><img src="/images/avatar.jpg" alt="" /></a>
                    </header>
                    <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic07.jpg" alt="" /></a>
                </article>

            </div>
        </section>

        <!-- Posts List -->
        <section>
            <ul class="posts">
                <li>
                    <article>
                        <header>
                            <h3><a href="{{ route('blog.show', $post) }}">Lorem ipsum fermentum ut nisl vitae</a></h3>
                            <time class="published" datetime="2022-01-01">October 20, 2015</time>
                        </header>
                        <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic08.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="{{ route('blog.show', $post) }}">Convallis maximus nisl mattis nunc id lorem</a></h3>
                            <time class="published" datetime="2022-01-15">October 15, 2015</time>
                        </header>
                        <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic09.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="{{ route('blog.show', $post) }}">Euismod amet placerat vivamus porttitor</a></h3>
                            <time class="published" datetime="2022-01-10">October 10, 2015</time>
                        </header>
                        <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic10.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="{{ route('blog.show', $post) }}">Magna enim accumsan tortor cursus ultricies</a></h3>
                            <time class="published" datetime="2022-01-08">October 8, 2015</time>
                        </header>
                        <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic11.jpg" alt="" /></a>
                    </article>
                </li>
                <li>
                    <article>
                        <header>
                            <h3><a href="{{ route('blog.show', $post) }}">Congue ullam corper lorem ipsum dolor</a></h3>
                            <time class="published" datetime="2022-01-06">October 7, 2015</time>
                        </header>
                        <a href="{{ route('blog.show', $post) }}" class="image"><img src="/images/pic12.jpg" alt="" /></a>
                    </article>
                </li>
            </ul>
        </section>

        <!-- About -->
        <section class="blurb">
            <h2>About</h2>
            <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
            <ul class="actions">
                <li><a href="javascript:void(0);" class="button">Learn More</a></li>
            </ul>
        </section>

        <!-- Footer -->
        <section id="footer">
            <ul class="icons">
                <li><a href="javascript:void(0);" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="javascript:void(0);" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="javascript:void(0);" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="javascript:void(0);" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
                <li><a href="javascript:void(0);" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
        </section>

    </section> --}}
@stop

@push('css_after')
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
@endpush

@push('js_after')
    <script src="/js/bootstrap.min.js"></script>
@endpush
