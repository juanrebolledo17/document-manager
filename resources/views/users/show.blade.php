@extends('layouts.app')

@section('content')
<div class="container-fluid pt-2">
	<div class="card">
		<div class="card-header d-flex justify-content-between">
			{{ __('strings.user') }}
			<a href="{{ route('users.index') }}" class="" data-toggle="tooltip" data-placement="top" title="{{ __('strings.back') }}">
				<i class="fas fa-chevron-left"></i>
				{{  __('strings.back') }}
			</a>
		</div>
		<div class="card-body">
			<div class="row mt-4 mb-4">
				<div class="col">
					<ul class="nav nav-tabs" role="tablist">
				    <li class="nav-item">
				       <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true">
				       		<i class="fas fa-user"></i> 
				       		@lang('strings.overview')
				       	</a>
				    </li>
					</ul>

					<div class="tab-content">
				    <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
				        @include('users.show.tabs.overview')
				    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection