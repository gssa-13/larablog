<!-- Post -->
<div class="post">
    <div class="user-block">
        <img class="img-circle img-bordered-sm" src="/admin/img/user1-128x128.jpg" alt="user image">
        <span class="username">
          <a href="javascript:void(0);">{{ $user->name }}</a>
          <!-- <a href="javascript:void(0);" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
        </span>
        <span class="description">{{ __('tag.shared_at') . optional($post->published_at)->diffForHumans() }}</span>
    </div>
    <!-- /.user-block -->
    <p>{{ $post->excerpt }}</p>

    <p>
        <a href="{{ route('blog.show', $post) }}" class="btn btn-primary btn-sm" target="_blank">{{ __('blog.read_more') }}</a>
        <a href="javascript:void(0);" class="btn btn-danger btn-sm">Delete</a>
    </p>
</div>
<!-- /.post -->
