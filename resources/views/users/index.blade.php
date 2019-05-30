@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
        	{{ __('strings.users') }}
        	<a href="{{ route('users.create') }}" class="" data-toggle="tooltip" data-placement="top" title="{{ __('strings.create-user') }}">
        		<i class="fas fa-plus"></i>
        	</a>
        </div>

        <div class="card-body">  
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('strings.name') }}</th>
                <th scope="col">{{ __('strings.email') }}</th>
                <th scope="col">{{ __('strings.role') }}</th>
                <th scope="col">{{ __('strings.actions') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $key => $user)
                <tr>
                  <th scope="row">
                  @php
                    if ($key == 0) {
                      $key++;
                      echo $key;
                    } else {
                      echo $key + 1;
                    }
                  @endphp
                  {{-- $user->id --}}
                  </th>
                  <td>
                    {{ $user->name }}
                  </td>
                  <td>
                    {{ $user->email }} 
                  </td>
                  <td>
                    <ul class="p-0 m-0">
                      @foreach ($user->roles as $role)
                        <li>{{ ucwords($role->name) }}<li>
                      @endforeach
                    </ul>
                  </td>
                  <td class="d-flex">
                    <form action="{{ route('users.destroy', ['user' => $user]) }}" method="post" class="mr-1">
                      @csrf
                      @method('delete')

                      <button type="submit" class="btn-delete-file" data-toggle="tooltip" data-placement="top" title="Borrar">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn-download-file" data-toggle="tooltip" data-placement="top" title="Editar">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('users.show', ['user' => $user]) }}" class="btn-download-file ml-2" data-toggle="tooltip" data-placement="top" title="Ver">
                      <i class="fas fa-eye"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>         
        </div>
      </div>
    </div>
  </div>
</div>
@endsection