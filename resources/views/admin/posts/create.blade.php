<div class="modal fade" id="modal-default">
    <form method="POST" action="{{route('admin.posts.store', "#create")}}">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('tag.post_title')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <x-input
                            id="input_title_modal"
                            class=" @error('title') is-invalid @enderror"
                            type="text" name="title" :value="old('title')"
                            placeholder="{{__('tag.post_title')}}" autofocus
                            required/>
                        @error('title')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('tag.close')}}</button>
                    <button class="btn btn-success">{{__('tag.save')}}</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>
<!-- /.modal -->

@push('js_after')
    <script>
        if( window.location.hash === "#create") {
            $('#modal-default').modal('show');
        }

        $('#modal-default').on('hide.bs.modal', function() {
            window.location.hash = "#";
        });

        $('#modal-default').on('shown.bs.modal', function() {
            $('#input_title_modal').focus();
            window.location.hash = "#create";
        });
    </script>
@endpush
