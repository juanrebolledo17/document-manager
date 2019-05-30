<div class="sidebar">
	<nav class="sidebar-nav">
		<ul class="nav">
			<li class="nav-title">
			    @lang('strings.menus.sidebar.general')
			</li>
			<li class="nav-item">
				<a href="{{ route('admin.dashboard') }}" class="nav-link active">
					<i class="nav-icon icon-speedometer"></i>
					{{ __('strings.dashboard') }}
				</a>
			</li>
			<li class="nav-title">
				{{ __('strings.system') }}
			</li>
			<li class="nav-item">
				<a href="{{ route('users.index') }}" class="nav-link">
					<span class="nav-icon icon-user"></span>
					@lang('strings.users')
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('roles.index') }}" class="nav-link">
					<span class="nav-icon icon-lock"></span>
					@lang('strings.roles')
				</a>
			</li>
			<li class="nav-item nav-dropdown">
				<a href="#" 
					class="nav-link nav-dropdown-toggle"  
					role="button" 
					aria-haspopup="true" 
					aria-expanded="false"
				>
					<span class="nav-icon icon-docs"></span>
					@lang('strings.documents') 
				</a>
				<ul class="nav-dropdown-items">
					<li class="nav-item">
						<a href="{{ route('documents-index') }}" class="nav-link">
							@lang('strings.see-all')
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('documents-uploads') }}" class="nav-link">
							@lang('strings.uploads')
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('documents-downloads') }}" class="nav-link">
							@lang('strings.downloaded')
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item nav-dropdown">
				<a href="#" 
					class="nav-link nav-dropdown-toggle"  
					role="button" 
					aria-haspopup="true" 
					aria-expanded="false"
				>
					<span class="nav-icon icon-docs"></span>
					@lang('strings.calendar') 
				</a>
				<ul class="nav-dropdown-items">
					<li class="nav-item">
						<a href="{{ route('events.index') }}" class="nav-link">
							@lang('strings.events')
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('events.create') }}" class="nav-link">
							@lang('strings.create-event')
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
	<button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>