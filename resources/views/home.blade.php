@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('strings.dashboard') }}</div>

        <div class="card-body">
          @php 
            var_dump(session('locale')); 
            var_dump(app()->getLocale());
          @endphp        
        </div>
      </div>

      <datatable></datatable>
    </div>
  </div>
</div>
@endsection
