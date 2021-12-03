<ul class="stats">
    <li>
        <a style="color: inherit; font-size: inherit;"
           href="{{ route('blog.categories.show', $post->category) }}">
            {{ optional($post->category)->name }}
        </a>
    </li>
    <li><a href="javascript:void(0);" class="icon solid fa-heart">28</a></li>
    <li><a href="javascript:void(0);" class="icon solid fa-comment">128</a></li>
</ul>
