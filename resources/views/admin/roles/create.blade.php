@extends('layouts.admin')

@push('css_after')
    <!-- Select2 -->
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endpush

@section('title')
    {{__('tag.register_role')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{__('tag.admin')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">{{__('tag.roles')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.register_rol')}}</li>
@stop

@section('content')
<div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{__('tag.register_role')}}</h3>

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
                            <h3 class="card-title">{{ __('tag.register_role') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form method="POST" action="{{ route('admin.roles.store') }}">
                            @include('admin.roles.form')
                        </form>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('tag.permissions') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                            </div>
                            <br>
                            <div class="form-group">
                            </div>
                            <!-- /.save button -->
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
