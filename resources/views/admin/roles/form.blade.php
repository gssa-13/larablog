@csrf
<div class="card-body">
    <div class="form-group">
        @if($role->exists)
            <x-label for="identifier" :value="__('tag.role_name')" />
            <x-input id="name" type="text" name="name" :value="$role->name" disabled/>
        @else
            <x-label for="name" :value="__('tag.role_name')" />
            <x-input id="name" type="text" name="name" :value="old('name')" placeholder="{{__('tag.role_name')}}" required/>
            @error('name')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        @endif
    </div>
    <div class="form-group @error('display_name') is-invalid @enderror">
        <x-label for="display_name" :value="__('tag.role_name')" />
        <x-input id="display_name" type="text" name="display_name"
                 :value="old('display_name', $role->display_name)"
                 placeholder="{{__('tag.role_name')}}" required/>
        @error('display_name')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <x-label for="guard_name" :value="__('tag.guard_name')" />
        <select id="guard_name" name="guard_name" class="select2bs4 @error('guard_name') is-invalid @enderror"  data-placeholder="{{__('tag.select_an_options')}}" style="width: 100%;">
            @foreach( config('auth.guards') as $guard_name => $guard )
                <option value="{{ $guard_name }}"
                    {{ old('$guard_name', $role->$guard_name) === $guard_name ? 'selected' : '' }}
                >{{ $guard_name }}</option>
            @endforeach
        </select>
        @error('tags')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('tag.permissions') }}</h3>
        </div>
        <br>
        @include('admin.permissions.partials.checkboxes', ['model' => $role])
    </div>
    <div class="form-group">
        <x-button class="btn-success">
            {{ __('tag.save') }}
        </x-button>
    </div>
</div>
