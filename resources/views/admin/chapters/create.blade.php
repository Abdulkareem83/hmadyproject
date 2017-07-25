@extends('layouts.adminLayout')

@section('content')
	<section class="create-chapter-section">
		<div class="box box-info">
			<div class="box-header with-border">
				{{ trans('lang.'.$title) }}
			</div>
			<div class="box-body">
				<form role="form" action="{{ isset($chapter) ? url('save-chapter') : url('store-chapter') }}" method="post">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>
							{{ trans('lang.name') }}
						</label>
						{{ csrf_field() }}
						@if (isset($chapter))
							<input type="hidden" name="id" value="{{ $chapter->id }}">
							<input type="hidden" name="courseId" value="{{ $chapter->course_id }}">
						@else
							<input type="hidden" name="courseId" value="{{ $courseId }}">
						@endif
						<input type="text" class="form-control" name="name" value="{{ isset($chapter) ? $chapter->name : old('name') }}">
						@if ($errors->has('name'))
							<span class='help-block'>
								{{ $errors->first('name') }}
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
						<label>
							{{ trans('lang.description') }}
						</label>
						<textarea class="form-control" name="description" rows="9">{{ isset($chapter) ? $chapter->description : old('description') }}</textarea>
						@if ($errors->has('description'))
							<span class='help-block'>
								{{ $errors->first('description') }}
							</span>
						@endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-info pull-right">{{ isset($chapter) ? trans('lang.save') : trans('lang.create') }}</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@stop