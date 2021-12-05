@extends('layouts.admin')

@push('css_after')
@endpush

@section('title')
    {{__('tag.user_profile')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('tag.admin')}}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{__('tag.users')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.users_list')}}</li>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="/admin/img/user4-128x128.jpg"
                                     alt="{{ $user->name }}">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>{{ __('tag.email') }}</b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>{{ __('tag.posts') }}</b> <a class="float-right">{{ $user->posts->count() }}</a>
                                </li>
                                @if( $user->roles->count() )
                                <li class="list-group-item">
                                    <b>{{ __('tag.roles') }}</b> <a class="float-right">{{ $user->getRoleNames()->implode(', ') }}</a>
                                </li>
                                @endif
                            </ul>

                            <a href="javascript:void(0);" class="btn btn-primary btn-block"><b>{{ __('tag.edit') }}</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('tag.permissions') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @forelse( $user->permissions as $permission )
                                @include('admin.users.profile.tab-permissions')
                                @unless($loop->last)
                                    <hr>
                                @endunless
                            @empty
                                <strong>{{ __('tag.user_has_not_additional_permissions') }}</strong>
                            @endforelse
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#roles" data-toggle="tab">{{ __('tag.post') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">{{ __('tag.roles') }}</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="roles">
                                    @forelse( $user->posts as $post)
                                        @include('admin.users.profile.tab-posts')
                                    @empty
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="/admin/img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                                                    <a href="javascript:void(0);">{{ __('tag.system') }}</a>
                                                </span>
                                                <span class="description">{{ today() }}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>{{ __('tag.user_has_not_posts') }}</p>
                                        </div>
                                    @endforelse
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        @forelse( $user->roles as $role )
                                            @include('admin.users.profile.tab-roles')
                                        @empty
                                            <div class="timeline-body">
                                                {{ __('tag.user_has_not_roles') }}
                                            </div>
                                        @endforelse
                                        <!-- /.timeline-label -->
                                    </div>
                                    <!-- /.The timeline -->
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="javascript:void(0);">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop

@push('js_after')

@endpush
