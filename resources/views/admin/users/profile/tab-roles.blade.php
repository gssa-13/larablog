<!--
<div class="time-label">
    <span class="bg-danger">
      10 Feb. 2014
    </span>
</div>
-->
<!-- timeline item -->
<div>
    <i class="fas fa-user-tie bg-primary"></i>

    <div class="timeline-item">

        <span class="time">
            <i class="far fa-clock"></i>
        </span>

        <h3 class="timeline-header">
            <a href="javascript:void(0);">{{ $role->name }}</a>
        </h3>
        @if( $role->permissions->count() )
            <div class="timeline-body">{{ __('tag.permissions') . $role->permissions->pluck('name')->implode(', ') }}</div>
        @endif
    </div>
</div>
<!-- END timeline item -->
