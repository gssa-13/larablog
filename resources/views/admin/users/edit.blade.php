@extends('layouts.admin')

@push('css_after')
    <!-- Select2 -->
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endpush

@section('title')
    {{__('tag.edit_user')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{__('tag.admin')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">{{__('tag.users')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.edit_user')}}</li>
@stop

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">{{__('tag.edit_user')}}</h3>

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
                        <div class="col-md-7">
                            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                                @method('PUT')
                                @csrf
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('tag.personal_data') }}</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group @error('name') is-invalid @enderror">
                                            <x-label for="name" :value="__('tag.user_name')" />
                                            <x-input id="name" type="text" name="name" :value="old('name',$user->name)" placeholder="{{__('tag.user_name')}}" required/>
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('email') is-invalid @enderror">
                                            <x-label for="email" :value="__('tag.email')" />
                                            <x-input id="email" type="email" name="email" :value="old('email',$user->email)" placeholder="{{__('tag.email')}}" required/>
                                            @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group @error('password') is-invalid @enderror">
                                            <x-label for="password" :value="__('tag.password')" />
                                            <x-input id="password" type="password" name="password" placeholder="{{__('tag.password')}}"/>
                                            <span class="text-muted">Dejar en Blanco para no actualizar su contrasena</span>
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <x-label for="password_confirmation" :value="__('tag.password_confirmation')" />
                                            <x-input id="password_confirmation" type="password" name="password_confirmation" placeholder="{{__('tag.password_confirmation')}}"/>
                                        </div>

                                        <div class="form-group">
                                            <x-button class="btn-success">
                                                {{ __('tag.update_user') }}
                                            </x-button>
                                        </div>
                                        <!-- /.save button -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('tag.roles') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            @include('admin.roles.partials.checkboxes')
                                        </div>
                                        <div class="form-group">
                                            <x-button class="btn-success">
                                                {{ __('tag.update_roles') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.roles -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('tag.permissions') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            @include('admin.permissions.partials.checkboxes')
                                        </div>
                                        <div class="form-group">
                                            <x-button class="btn-success">
                                                {{ __('tag.update_permissions') }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.permissions -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.card-body -->

            <div class="card-footer"></div>
        </div>
        <!-- /.card -->
    </div>
@stop

@push('js_after')
    <!-- Select2 -->
    <script src="/admin/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {
            $('.roles').select2({
                theme: 'bootstrap4',
                tags: true
            });

            $('.permissions').select2({
                theme: 'bootstrap4',
                tags: true
            });
        });
    </script>
@endpush
