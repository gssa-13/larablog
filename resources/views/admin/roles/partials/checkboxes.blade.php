@foreach($roles as $role)
    <div class="icheck-primary">
        <input type="checkbox" id="{{ 'checkbox-'.$role->id}}" name="roles[]" value="{{ $role->id }}"
            {{ $user->roles->contains($role->id) ? 'checked' : '' }} >
        <label for="{{ 'checkbox-'.$role->id}}">{{ $role->name }}</label>
        <br>
        <small class="text-muted">
            {{ $role->permissions->pluck('name')->implode(', ') }}
        </small>
    </div>
    <br>
@endforeach
