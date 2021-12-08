@extends('layouts.blog')

@section('title', 'Archive')

@section('meta-description', 'Archive')

@section('content')
<!-- Main -->
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
                <a href="javascript:void(0);" class="author"><span class="name">System</span><img src="/images/avatar.jpg" alt="" /></a>
            </div>
        </header>
        <section>
            <div class="row">
                <div class="col-6 col-12-medium">
                    <h3>Authors</h3>
                    <ul>
                        @foreach($authors as $author)
                            <li>{{ $author->name }}</li>
                        @endforeach
                    </ul>
                    <br>
                    <br>
                    <h3>Categories</h3>
                    <ul class="alt">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('blog.categories.show', $category) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6 col-12-medium">
                    <h3>Posts</h3>
                    <ol>
                        @foreach($posts as $post)
                            <li>
                                <a href="{{ route('blog.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                    <br>
                    <h3>Posts By Month</h3>
                    <ul class="dates">
                        @forelse($archives as $archive)
                            <li class="text-capitalize">
                                <a href="{{ route('home',['month' => $archive->month, 'year' => $archive->year]) }}">
                                    {{ $archive->year.' '.$archive->monthname.' ('.$archive->posts.')'}}
                                </a>
                            </li>
                        @empty
                            <li>
                                <a href="javascript:void(0);">
                                    Aun no hay posts publicados
                                </a>
                            </li>
                        @endforelse
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
<!-- Main -->
@stop
