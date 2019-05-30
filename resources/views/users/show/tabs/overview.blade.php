<div class="col">
	<div class="table-responsive">
		<table class="table table-hover">
			<tr>
				<th>
					@lang('strings.name')
				</th>
				<td>
					{{ $user->name }}
				</td>
			</tr>

			<tr>
				<th>
					@lang('strings.email')
				</th>
				<td>
					{{ $user->email }}
				</td>
			</tr>

			<tr>
				<th>
					@lang('strings.created_at')
				</th>
				<td>
					{{-- $user->created_at --}}
					{{ $newCreatedAt }}
				</td>
			</tr>

			<tr>
				<th>
					@lang('strings.last_updated_at')
				</th>
				<td>
					{{-- $user->updated_at --}}
					{{ $newUpdatedAt }}
				</td>
			</tr>
			
		</table>
	</div>
</div>