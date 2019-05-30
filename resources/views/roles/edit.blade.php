@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{ route('role.update', ['role' => $role]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            {{ __('strings.edit-role') }}
            <a href="{{ route('roles.index') }}" class="btn-link-back">
              <i class="fas fa-chevron-left"></i>
                  {{  __('strings.back') }}
            </a> 
          </div>

          <div class="card-body"> 
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('strings.name') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{ $role->name }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="permissions" class="col-md-4 col-form-label text-md-right">{{ __('strings.associated-permission') }}</label>

              <div class="col-md-6">
                <div class="checkbox d-flex flex-column align-items-start">
                  @foreach ($permissions as $permission)
                    <div class="d-flex flex-row pb-2">
                      <label for="permission-{{ $permission->id }}" class="switch switch-label switch-pill switch-primary mr-2">
                        <input 
                          type="checkbox" 
                          class="switch-input" 
                          name="permissions[]" 
                          id="permission-{{ $permission->id }}" 
                          value="{{ $permission->id }}"
                          @foreach ($role->permissions as $rolePermission)
                            @if ($rolePermission->name == $permission->name)
                              checked
                            @else
                              unchecked
                            @endif
                          @endforeach
                        >
                        <span 
                          class="switch-slider" 
                          data-checked="on" 
                          data-unchecked=off
                        ></span>
                      </label>
                      <label for="permission-{{ $permission->id }}">
                        @lang('strings.' . $permission->name)
                      </label>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-blue-theme">
                  {{ __('strings.update') }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection




        
