@extends('layouts.adminLayout')

@section('content')
	<section class="create-category-section">
		<div class="box box-info">
			<div class="box-header with-border">
				{{ trans("lang.".$title) }}
			</div>
			<div class="box-body">
				<form role="form" action="{{ url('store-category') }}" method="post">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>
							{{ trans('lang.name') }}
						</label>
						{{ csrf_field() }}
						<input type="text" class="form-control" name="name" value="{{ old('name') }}">
						@if ($errors->has('name'))
							<span class='help-block'>
								{{ $errors->first('name') }}
							</span>
						@endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-info pull-right">{{ trans('lang.create') }}</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@stop