@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          {{ __('strings.upload') }}
          <!-- <a href="#" class="btn-link-back" onclick="location === history.back()">
            <i class="fas fa-chevron-left"></i>
            {{  __('strings.back') }}
          </a> -->
          <a href="{{ route('documents-index') }}" class="btn-link-back">
            <i class="fas fa-chevron-left"></i>
            {{  __('strings.back') }}
        	</a> 
        </div>

        <div class="card-body">
          <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row">
              <label for="filename" class="col-md-4 col-form-label text-md-right">{{ __('strings.filename') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="filename">
              </div>
            </div>

            <div class="form-group row">
              <label for="extension" class="col-md-4 col-form-label text-md-right">{{ __('strings.extension') }}</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="extension">
              </div>
            </div>

            <input type="hidden" class="form-control" name="uploaded_by" value="{{ Auth::user()->name }}">

            <div class="form-group row">
              <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('strings.upload-document') }}</label>

              <div class="col-md-6">
                <input id="document" type="file" class="form-control-file" name="document">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-upload">
                  {{ __('strings.upload') }}
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