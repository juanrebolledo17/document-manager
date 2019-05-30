@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
        	{{ __('strings.documents') }}
        	<a href="#" class="btn-link-back" onclick="location === history.back()">
            <i class="fas fa-chevron-left"></i>
            {{  __('strings.back') }}
        	</a> 
        </div>

        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('strings.name') }}</th>
                <th scope="col">{{ __('strings.size') }}</th>
                <th scope="col">{{ __('strings.uploaded-by') }}</th>
                <th scope="col">{{ __('strings.uploaded-at') }}</th>
                <th scope="col">{{ __('strings.actions') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($files as $key => $file)
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
                  </th>
                  <td>
                    {{ $file->filename }}
                  </td>
                  <td>
                    {{ $file->size }} bytes
                  </td>
                  <td>
                    {{ $file->uploaded_by }}
                  </td>
                  <td>
                    {{ $file->created_at }}
                  </td>
                  <td class="d-flex">
                    <form action="{{ route('delete-document', ['file' => $file]) }}" method="post" class="mr-1">
                      @csrf
                      @method('delete')

                      <button type="submit" class="btn-delete-file" data-toggle="tooltip" data-placement="top" title="Borrar">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    <a href="{{ route('download-document', ['file' => $file]) }}" class="btn-download-file" data-toggle="tooltip" data-placement="top" title="Descargar">
                      <i class="fas fa-download"></i>
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