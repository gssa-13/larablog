<x-label for="permissions" :value="__('tag.permissions')" />
<select id="permissions" name="permissions[]"
        class="permissions @error('permissions') is-invalid @enderror" multiple="multiple"
        data-placeholder="{{__('tag.select_an_options')}}" style="width: 100%;">
    @foreach($permissions as $id => $name)
        <option value="{{ $id }}"
            {{ collect(old('permissions', $user->permissions->pluck('id') ))->contains($id) ? 'selected' : '' }}
        >{{$name}}</option>
    @endforeach
</select>
@error('tags')
<span class="error invalid-feedback">{{ $message }}</span>
@enderror
