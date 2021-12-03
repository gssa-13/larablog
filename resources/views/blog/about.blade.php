@extends('layouts.blog')

@section('title', 'About')

@section('meta-description', 'About')

@section('content')
    <!-- Main -->
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="javascript:void(0)">About</a></h2>
                </div>
                <div class="meta">
                    <time class="published" datetime="2022-01-01">2022-01-01</time>
                    <a href="javascript:void(0);" class="author"><span class="name">System</span><img src="/images/avatar.jpg" alt="" /></a>
                </div>
            </header>
            <footer>
                <ul class="stats">
                    <li><a href="javascript:void(0);">About</a></li>
                    <li><a href="javascript:void(0);" class="icon solid fa-heart">28</a></li>
                    <li><a href="javascript:void(0);" class="icon solid fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
    </div>
    <!-- Main -->
@stop
