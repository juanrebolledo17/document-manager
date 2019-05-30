@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
      	<div class="card-header">
      		@lang('strings.events')
      	</div>
      	<div class="card-body">
      		<calendar-container 
            change-language="@lang('strings.change-language')"
            locale="{{ app()->getLocale() }}"
          ></calendar-container>
      	</div>
      </div>
    </div>
  </div>
</div>
@endsection
