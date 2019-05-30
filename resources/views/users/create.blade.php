@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card">
          <div class="card-header d-flex justify-content-between">
            {{ __('strings.create-user') }}
            <a href="{{ route('users.index') }}" class="btn-link-back">
              <i class="fas fa-chevron-left"></i>
                  {{  __('strings.back') }}
            </a> 
          </div>

          <div class="card-body"> 
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('strings.name') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="name">
              </div>
            </div>


            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('strings.email') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="email">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('strings.password') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="password">
              </div>
            </div>

            <div class="form-group row">
              <label for="confirm_password" class="col-md-4 col-form-label text-md-right">{{ __('strings.confirm_password') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="confirm_password">
              </div>
            </div>

            <div class="form-group row d-flex justify-content-center">
              <label for="roles" class="col-md-2 col-form-label text-md-right">
                {{ __('strings.associated-roles') }}
              </label>
              
              <div class="d-flex flex-column col-md-6">
                @foreach ($roles as $role)
                  <div class="card" style="width: 100%">
                    <div class="card-header d-flex">
                      <div class="d-flex flex-row">
                        <label for="role-{{ $role->id }}" class="switch switch-label switch-pill switch-primary mr-2 custom-users-label">
                          <input type="checkbox" class="switch-input" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->id }}">
                          <span class="switch-slider" data-checked="on" data-unchecked=off></span>
                        </label>
                      </div>
                      <span>{{ ucwords($role->name) }}</span>
                    </div>
                    <div class="card-body">
                      <ul class="users-permissions">
                        @foreach ($role->permissions as $permission)
                          <li>
                            {{ ucwords($permission->name) }}
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-blue-theme">
                  {{ __('strings.create') }}
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