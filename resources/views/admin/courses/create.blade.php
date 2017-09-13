@extends('layouts.adminLayout')

@section('head')
	<link rel="stylesheet" type="text/css" href="{{ url('admin') }}/plugins/bootsnipp-file-input/bootsnipp-file-input.css">
	<link rel="stylesheet" href="{{ url('admin') }}/bower_components/select2/dist/css/select2.min.css">
@stop

@section('content')
	<section class="create-course-section">
		<div class="box box-info">
			<div class="box-header with-border">
				{{ trans("lang.".$title) }}
			</div>
			<div class="box-body">
				<form role="form" enctype="multipart/form-data" action="{{ isset($course) ? url('save-course') : url('store-course') }}" method="post">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>
							{{ trans('lang.name') }}
						</label>
						{{ csrf_field() }}
						@if (isset($course))
							<input type="hidden" name="id" value="{{ $course->id }}">
						@endif
						<input type="text" class="form-control" name="name" value="{{ isset($course) ? $course->name : old('name') }}">
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
						<textarea class="form-control" name="description" rows="9">{{ isset($course) ? $course->description : old('description') }}</textarea>
						@if ($errors->has('description'))
							<span class='help-block'>
								{{ $errors->first('description') }}
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
						<label>
							{{ trans('lang.categories') }}
						</label>
						@if (count($categories))
							<select name="categories[]" class="form-control select2" multiple="">
								@foreach( $categories as $category )
									<option value="{{ $category->id }}" {{ isset($course) ? (in_array($category->id, $selectCategories)? 'selected': '') : ''  }}>
										{{ $category->name }}
									</option>
								@endforeach
							</select>
						@endif
						@if ($errors->has('categories'))
							<span class='help-block'>
								{{ $errors->first('categories') }}
							</span>
						@endif
					</div>
					<div class="form-group has-feedback {{ $errors->has( 'picture' ) ? 'has-error' : '' }}">
					    <label class="image-label">
					        {{ trans('lang.picture') }}
					    </label>
					    @if( isset( $course ) )
					        <div class="icon-container">
					            <p href="#" class="thumbnail">
					                <img class="responsive-img" src="{{ $course->picture }}" alt="{{ trans('lang.picture') }}">
					            </p>
					        </div>
					    @endif
					    <!-- image-preview-filename input [CUT FROM HERE]-->
					    <div class="input-group image-preview">
					        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
					        <span class="input-group-btn">
					            <!-- image-preview-clear button -->
					            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
					                <span class="glyphicon glyphicon-remove"></span> {{ trans( 'lang.clear' ) }}
					            </button>
					            <!-- image-preview-input -->
					            <div class="btn btn-default image-preview-input">
					                <span class="glyphicon glyphicon-folder-open"></span>
					                <span class="image-preview-input-title">{{ trans( 'lang.browse' ) }}</span>
					                <input type="file" accept="image/png, image/jpeg, image/gif" name="picture" {{ isset($course) ? '' : 'required' }} /> <!-- rename it -->
					            </div>
					        </span>
					    </div><!-- /input-group image-preview [TO HERE]--> 
					    <span class="help-block">
					        {{ $errors->has( 'picture' ) ? $errors->first( 'picture' ) : '' }}
					    </span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-info pull-right">{{ isset($course) ? trans('lang.save') : trans('lang.create') }}</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@stop

@section('script')
	<script type="text/javascript" src="{{ url('admin') }}/plugins/bootsnipp-file-input/bootsnipp-file-input.js"></script>
	<!-- Select2 -->
	<script src="{{ url('admin') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.select2').select2();
		});
	</script>
@stop