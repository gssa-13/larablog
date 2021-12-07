@extends('layouts.blog')

@section('title', '403')

@section('meta-description', 'Not Found')

@section('content')
    <!-- Main -->
    <div id="main">
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="javascript:void(0);">403 Forbidden</a></h2>
                    <p>
                        <a href="javascript:void(0);">This action is unauthorized.</a>
                    </p>
                </div>
                <div class="meta">
                    <time class="published" datetime="2022-01-01">{{ date('Y-m-d') }}</time>
                    <a href="javascript:void(0);" class="author"><span class="name">System</span><img src="/images/avatar.jpg" alt="" /></a>
                </div>
            </header>


            <content>
                {{ $exception->getMessage() }}

                <br>
                <br>

                <a href="{{ url()->previous() }}">
                    <span class="name">{{ __('blog.return_previous_page') }}</span>
                </a>
            </content>

        </article>
    </div>
    <!-- Main -->
@stop
