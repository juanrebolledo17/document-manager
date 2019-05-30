@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          {{ __('strings.roles-administration') }}
          <a href="{{ route('role.create') }}" data-toggle="tooltip" data-placement="top" title="{{ __('strings.create-new-role') }}">
        		<i class="fas fa-plus"></i>
        	</a>
        </div>

        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">{{ __('strings.role') }}</th>
                <th scope="col">{{ __('strings.permissions') }}</th>
                <th scope="col">{{ __('strings.number-of-users') }}</th>
                <th scope="col">{{ __('strings.actions') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
                <tr>
                  <td>
                    @lang('strings.' . $role->name)
                  </td>
                  <td>
                    @if ($role->id == 1)
                        @lang('strings.all-permissions')
                    @else
                        @if ($role->permissions->count())
                          <ul class="p-0 m-0">
                            @foreach($role->permissions as $permission)
                              <li>
                                @lang('strings.' . $permission->name)
                              </li>
                            @endforeach
                          </ul>
                        @else
                            @lang('strings.none')
                        @endif
                    @endif
                  </td>
                  <td>
                    {{ $role->users->count() }}
                  </td>
                  <td class="d-flex">
                    @if ($role->name == 'administrator')
                      <span>N/A</span>
                    @else
                      <form action="{{ route('role.destroy', ['role' => $role]) }}" method="post" class="mr-1">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn-delete-file" data-toggle="tooltip" data-placement="top" title="Borrar">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                      <a href="{{ route('role.edit', ['role' => $role]) }}" class="btn-download-file" data-toggle="tooltip" data-placement="top" title="Editar">
                        <i class="fas fa-edit"></i>
                      </a>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table> 
          
          <div class="row">
            <div class="col">
              <p class="text-muted">
                {{ __('strings.total-number-of-roles') }} -  {{ count($roles) }}
              </p>
            </div>
          </div>       
        </div>
      </div>
    </div>
  </div>
</div>
@endsection