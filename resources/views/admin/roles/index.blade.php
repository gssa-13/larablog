@extends('layouts.admin')

@push('css_after')
    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('title')
    {{__('tag.roles_list')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('tag.admin')}}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('tag.roles')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.roles_list')}}</li>
@stop

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Ver todos los roles</h3>

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
                <a href="{{ route('admin.roles.create') }}" class="btn btn-success btn-flat float-right">
                    {{__('tag.register_role')}}
                    <i class="fas fa-plus-circle ml-1"></i>
                </a>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 5%;">{{__('tag.id')}}</th>
                        <th style="width: 20%;">{{__('tag.name')}}</th>
                        <th style="width: 20%;">{{__('tag.display_name')}}</th>
                        <th style="width: 10%;">{{__('tag.guard_name')}}</th>
                        <th style="width: 35%;">{{__('tag.permissions')}}</th>
                        <th style="width: 10%;">{{__('tag.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td class="text-center">{{$role->id}}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
                            <td>
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-flat btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($role->id !== 1)
                                    <form method="POST" style="display: inline;"
                                          action="{{ route('admin.roles.destroy', $role) }}">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-flat btn-danger"
                                                onclick="return confirm('Seguro desea eliminar a este rol?')">
                                            <i class="far fa-times-circle"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
        </div>
        <!-- /.card -->
    </div>
@stop

@push('js_after')

    <!-- DataTables  & Plugins -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
