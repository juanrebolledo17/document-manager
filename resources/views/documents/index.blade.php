@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
        	{{ __('strings.documents') }}
        	<a href="{{ route('upload-document') }}" class="" data-toggle="tooltip" data-placement="top" title="{{ __('strings.upload') }}">
        		<i class="fas fa-plus"></i>
        	</a>
        </div>

        <div class="card-body">
          <div class="d-flex justify-content-start">
            <form action="{{ route('search-documents') }}" class="form-inline" method="get">
              @csrf
              <div class="form-group mb-3">
                <label for="search" class="sr-only">{{ __('strings.search') }}</label>
                <input type="text" name="search" class="form-control mr-2 custom-search-input" placeholder="{{ __('strings.search-documents') }}">
                <button class="btn btn-search-documents" type="submit">
                  {{ __('strings.search') }}
                </button>
              </div>
            </form>
          </div>
          
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('strings.name') }}</th>
                <th scope="col">{{ __('strings.size') }}</th>
                <th scope="col">{{ __('strings.uploaded-by') }}</th>
                <th scope="col">{{ __('strings.uploaded-at') }}</th>
                <th scope="col">{{ __('strings.actions') }}</th>
                <th scope="col">
                  {{ __('strings.uploaded') }} / {{ __('strings.downloaded') }}
                </th>
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
                  <td class="">
                    <i class="fas fa-arrow-alt-circle-up uploaded-green"></i>
                    /
                    <i class="
                    fas fa-arrow-alt-circle-down
                    @if ($file->downloaded) 
                      downloaded-blue
                    @else
                      downloaded-red
                    @endif
                    ">
                    </i>
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