<header class="app-header navbar">
	<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a href="{{ url('/') }}" class="navbar-brand">
		<img src="{{ asset('svg/logo.svg') }}" alt="Modulr Logo" class="navbar-brand-full" width="89" height="25">
		<img src="svg/sygnet.svg" alt="Modulr Logo" class="navbar-brand-minimized" width="30" height="30">
	</a>
	<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
		<span class="navbar-toggler-icon"></span>
	</button>

	<ul class="nav navbar-nav mr-auto ml-3">
		<li class="nav-item">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				<span class="d-md-down-none">
					@lang('strings.menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})
				</span>
			</a>

			<div class="dropdown-menu dropdown-menu-right language-picker-dropdown" aria-labelledby="navbarDropdownLanguageLink">
				@foreach(array_keys(config('locale.languages')) as $lang)
					@if ($lang != app()->getLocale())
						<small>
							<a href="{{ '/lang/' . $lang }}" class="dropdown-item">
								@lang('strings.menus.language-picker.langs.' . $lang)
							</a>
						</small>
					@endif
				@endforeach
			</div>
		</li>
	</ul>

	<ul class="nav navbar-nav ml-auto mr-3">
		<li class="nav-item dropdown">
			<a href="#" 
				class="nav-link dropdown-toggle" 
				data-toggle="dropdown" 
				role="button" 
				aria-haspopup="true" 
				aria-expanded="false"
			>
				<img src="{{ Auth::user()->avatar_url }}" alt="" class="img-avatar mx-1">
				{{ Auth::user()->name }}
			</a>
			<div class="dropdown-menu dropdown-menu-right mt-2 user-information">
				<div class="dropdown-header text-center account-header">
				  <strong>@lang('strings.account')</strong>
				</div>
				<a class="dropdown-item header-admin-link">
					{{ Auth::user()->name }} <br>
					<small class="user-email">{{ Auth::user()->email }}</small>
				</a>
				<div class="divider"></div>
				<div class="dropdown-header text-center account-header">
				  <strong>@lang('strings.settings')</strong>
				</div>
				<a href="/profile" class="dropdown-item header-admin-link">
					<i class="fas fa-user"></i> {{ __('strings.profile') }} 
				</a>
				<div class="divider"></div>
				<a href="/password" class="dropdown-item header-admin-link">
					<i class="fas fa-key"></i> {{ __('strings.password') }}
				</a>
				<div class="divider"></div>
				<a href="{{ route('logout') }}" class="dropdown-item header-admin-link" 
					onclick="event.preventDefault(); 
					document.querySelector('#logout-form').submit();
				">
					<i class="fas fa-sign-out-alt"></i> {{ __('strings.logout') }}
				</a>
				<form action="{{ route('logout') }}" method="post" id="logout-form" style="display:none;">
					@csrf
				</form>
			</div>
		</li>
	</ul>
</header>