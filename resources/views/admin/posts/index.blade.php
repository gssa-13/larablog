@extends('layouts.admin')

@push('css_after')
    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('title')
    {{__('tag.posts_list')}}
@stop

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('tag.blog')}}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('tag.posts')}}</a></li>
    <li class="breadcrumb-item active">{{__('tag.posts_list')}}</li>
@stop

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Ver todos los posts</h3>

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
                <button class="btn btn-success btn-flat float-right" data-toggle="modal" data-target="#modal-default">
                    {{__('tag.write_post')}}
                    <i class="fas fa-plus-circle ml-1"></i>
                </button>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%;">{{__('tag.id')}}</th>
                            <th style="width: 30%;">{{__('tag.title')}}</th>
                            <th style="width: 50%;">{{__('tag.excerpt')}}</th>
                            <th style="width: 15%;">{{__('tag.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="text-center">{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->excerpt}}</td>
                                <td>
                                    <a href="{{ route('blog.show', $post) }}" class="btn btn-sm btn-flat btn-secondary" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-flat btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" style="display: inline;"
                                          action="{{ route('admin.posts.destroy', $post) }}">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-flat btn-danger"
                                        onclick="return confirm('Seguro desea eliminar esta publicacion?')">
                                            <i class="far fa-times-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                the plugin.
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
