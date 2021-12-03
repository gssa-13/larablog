@extends('layouts.blog')

@section('title', $post->title)

@section('meta-description', $post->excerpt)

@section('content')
    <!-- Main -->
    <div id="main">
        <article class="post">
            @include('blog.partials.header-post')
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
                @include('blog.partials.footer-stats')
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
