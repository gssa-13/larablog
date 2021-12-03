@foreach($post->tags as $tag)
    <a style="color: inherit; font-size: inherit;"
       href="{{ route('blog.tags.show', $tag) }}">#{{$tag->name}}</a>
@endforeach
