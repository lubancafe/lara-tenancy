@extends('tenant.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Role') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('role.update', $role) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') ?? $role->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class='form-group row'>
                            <label class="col-md-4 col-form-label text-md-right" for="permissions">Permissions</label>
                            <div class="col-md-6">
                                <select name="permissions[]" id="permissions" class="form-control" multiple>
                                    @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array($role->id , $role->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>{{ ucfirst($permission->name) }}</option>
                                    @endforeach
                                </select>
                                @error('permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('role.index') }}" class="btn btn-secondary">
                                    {{ __('Back') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
