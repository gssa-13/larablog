@extends('layouts.blog')

@section('title', $post->title)

@section('meta-description', $post->excerpt)

@section('content')
    <!-- Main -->
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="javascript:void(0)">{{ $post->title }}</a></h2>
                    @foreach($post->tags as $tag)
                        <p>#{{$tag->name}}</p>
                    @endforeach
                </div>
                <div class="meta">
                    <time class="published" datetime="2022-01-01">{{ optional($post->published_at)->diffForHumans()}}</time>
                    <a href="javascript:void(0);" class="author"><span class="name">Jane Doe</span><img src="/images/avatar.jpg" alt="" /></a>
                </div>
            </header>
            @if( $post->photos->count() === 1)
                <span class="image featured">
                    <img src="{{ $post->photos->first()->url }}" alt="" />
                </span>
            @elseif( $post->photos->count() > 1)
                @include('blog.carousel')
            @endif
            <br>
            {!! $post->content  !!}
            <footer>
                <ul class="stats">
                    <li><a href="javascript:void(0);">{{ optional($post->category)->name }}</a></li>
                    <li><a href="javascript:void(0);" class="icon solid fa-heart">28</a></li>
                    <li><a href="javascript:void(0);" class="icon solid fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
    </div>
    <!-- Main -->
@stop

@push('css_after')
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
@endpush

@push('js_after')
    <script src="/js/bootstrap.min.js"></script>
@endpush
