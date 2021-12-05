<header>
    <div class="title">
        <h2><a href="{{ route('blog.show', $post) }}">{{$post->title}}</a></h2>
        <br>
        @include('blog.partials.tags')
    </div>
    <div class="meta">
        <time class="published" datetime="2015-11-01">
            {{ optional($post->published_at)->diffForHumans() }}
        </time>
        <a href="javascript:void(0);" class="author">
            <span class="name">{{ $post->user->name }}</span>
        </a>
        <a href="javascript:void(0);" class="author">
            <img src="/images/avatar.jpg" alt="" />
        </a>

    </div>
</header>
