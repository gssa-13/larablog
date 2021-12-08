@extends('layouts.admin')

@push('css_after')
    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('title')
    {{__('tag.users_list')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('tag.admin')}}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('tag.users')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.users_list')}}</li>
@stop

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Ver todos los users</h3>

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
                @can('create', $users->first())
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-flat float-right">
                        {{__('tag.register_user')}}
                        <i class="fas fa-plus-circle ml-1"></i>
                    </a>
                @endcan
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%;">{{__('tag.id')}}</th>
                            <th style="width: 30%;">{{__('tag.name')}}</th>
                            <th style="width: 35%;">{{__('tag.email')}}</th>
                            <th style="width: 15%;">{{__('tag.roles')}}</th>
                            <th style="width: 15%;">{{__('tag.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->getRoleNames()->implode(', ')}}</td>
                                <td>
                                    @can('view', $user)
                                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-flat btn-secondary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endcan

                                    @can('update', $user)
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-flat btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $user)
                                        <form method="POST" style="display: inline;"
                                              action="{{ route('admin.users.destroy', $user) }}">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-flat btn-danger"
                                            onclick="return confirm('Seguro desea eliminar a este usuario?')">
                                                <i class="far fa-times-circle"></i>
                                            </button>
                                        </form>
                                    @endcan
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
            /*
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            */
        });
    </script>
@endpush
