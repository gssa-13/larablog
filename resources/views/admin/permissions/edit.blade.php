@extends('layouts.admin')

@push('css_after')
    <!-- Select2 -->
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endpush

@section('title')
    {{__('tag.edit_permission')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{__('tag.admin')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">{{__('tag.permissions')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.edit_permission')}}</li>
@stop

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">{{__('tag.edit_permission')}}</h3>

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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('tag.register_permission') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                        <div class="form-group">
                                            <x-label for="identifier" :value="__('tag.permission_name')" />
                                            <x-input id="name" type="text" name="name" :value="$permission->name" disabled/>
                                        </div>
                                        <div class="form-group @error('display_name') is-invalid @enderror">
                                            <x-label for="display_name" :value="__('tag.display_name')" />
                                            <x-input id="display_name" type="text" name="display_name"
                                                     :value="old('display_name', $permission->display_name)"
                                                     placeholder="{{__('tag.permission_name')}}" required/>
                                            @error('display_name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <x-label for="guard_name" :value="__('tag.guard_name')" />
                                            <select id="guard_name" name="guard_name" class="select2bs4 @error('guard_name') is-invalid @enderror"  data-placeholder="{{__('tag.select_an_options')}}" style="width: 100%;">
                                                @foreach( config('auth.guards') as $guard_name => $guard )
                                                    <option value="{{ $guard_name }}"
                                                        {{ old('$guard_name', $permission->$guard_name) === $guard_name ? 'selected' : '' }}
                                                    >{{ $guard_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('tags')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <x-button class="btn-success">
                                                {{ __('tag.save') }}
                                            </x-button>
                                        </div>

                                </div>
                            <!-- /.card-body -->
                            </form>
                        </div>
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
            $('.select2bs4').select2({
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
