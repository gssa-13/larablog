@extends('layouts.admin')

@push('css_after')
    <!-- summernote -->
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endpush

@section('title')
    {{__('tag.edit_post')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{__('tag.blog')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">{{__('tag.posts')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.create_post')}}</li>
@stop

@section('content')
    <form method="POST" action="{{route('admin.posts.update', $post)}}">
        @method('PUT')
        @csrf
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{__('tag.write_post')}}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- general form elements -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group @error('title') is-invalid @enderror">
                                        <x-label for="title" :value="__('tag.post_title')" />
                                        <x-input id="title" type="text" name="title" :value="old('title',$post->title)" placeholder="{{__('tag.post_title')}}" required/>
                                        @error('title')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group @error('content') is-invalid @enderror">
                                        <x-label for="content" :value="__('tag.post_content')" />
                                        <textarea id="content" name="content" rows="20" placeholder="{{__('tag.enter')}}">{{old('content', $post->content)}}</textarea>
                                        @error('content')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <x-label for="published_at" :value="__('tag.published_at')" />
                                        <x-input id="published_at" type="text" name="published_at" :value="old('published_at', $post->published_at ? $post->published_at->format('m/d/Y H:i') : null)" placeholder="{{__('tag.example_date')}}" class="datetimepicker-input" data-toggle="datetimepicker" data-target="#published_at"/>
                                    </div>
                                    <div class="form-group">
                                        <x-label for="category" :value="__('tag.category')" />
                                        <select name="category" class="form-control select2bs4 @error('category') is-invalid @enderror" style="width: 100%;" required>
                                            <option value="">{{__('tag.select_an_option')}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                    {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}
                                                >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <x-label for="tags" :value="__('tag.tags')" />
                                        <select id="tags" name="tags[]" class="select2bs4 @error('category') is-invalid @enderror" multiple="multiple" data-placeholder="{{__('tag.select_an_options')}}" style="width: 100%;">
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}"
                                                    {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                                                >{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('tags')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <x-label for="excerpt" :value="__('tag.post_excerpt')" />
                                        <textarea id="excerpt" name="excerpt" class="form-control form-control-border border-width-2  @error('content') is-invalid @enderror" rows="2" placeholder="{{__('tag.enter')}}" required>{{old('excerpt', $post->excerpt)}}</textarea>
                                        @error('excerpt')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <x-button class="btn-success">
                                            {{ __('tag.save') }}
                                        </x-button>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                    the plugin.
                </div>
            </div>
            <!-- /.card -->

        </div>
    </form>
@stop

@push('js_after')
    <!-- Summernote -->
    <script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Select2 -->
    <script src="/admin/plugins/select2/js/select2.full.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/admin/plugins/moment/moment.min.js"></script>
    <script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $(function () {
            // Summernote
            $('#content').summernote({
                tabSize: 2,
                height: 235,
                minHeight: 200,
                maxHeight: 340
            })
            // tempusdominus
            $('#published_at').datetimepicker();
            // Select2
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@endpush
