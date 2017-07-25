@extends('layouts.adminLayout')

@section('head')
	<!-- daterange picker -->
	<link rel="stylesheet" href="{{ url('admin') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
@stop

@section('content')
	<section class="create-video-section">
		<div class="box box-info">
			<div class="box-header with-border">
				{{ trans('lang.'.$title) }}
			</div>
			<div class="box-body">
				<form role="form" action="{{ isset($video) ? url('save-video') : url('store-video') }}" method="post">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>
							{{ trans('lang.name') }}
						</label>
						{{ csrf_field() }}
						@if (isset($video))
							<input type="hidden" name="id" value="{{ $video->id }}">
							<input type="hidden" name="chapterId" value="{{ $video->chapter_id }}">
						@else
							<input type="hidden" name="chapterId" value="{{ $chapterId }}">
						@endif
						<input type="text" class="form-control" name="name" value="{{ isset($video) ? $video->name : old('name') }}">
						@if ($errors->has('name'))
							<span class='help-block'>
								{{ $errors->first('name') }}
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
						<label>
							{{ trans('lang.link') }}
						</label>
						<input type="text" class="form-control" name="link" value="{{ isset($video) ? $video->link : old('link') }}" />
						@if ($errors->has('link'))
							<span class='help-block'>
								{{ $errors->first('link') }}
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('created_at') ? 'has-error' : '' }}">
	                	<label>
	                		{{ trans('lang.date') }}
	                	</label>
		                <div class="input-group date">
		                  	<div class="input-group-addon">
		                    	<i class="fa fa-calendar"></i>
		                  	</div>
		                  	<input type="text" class="form-control pull-right" name="created_at" value="{{ isset($video) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $video->created_at)->format('m/d/Y') : old('created_at') }}" id="datepicker">
		                </div>
	                	@if ($errors->has('created_at'))
	                		<span class='help-block'>
	                			{{ $errors->first('created_at') }}
	                		</span>
	                	@endif
	                	<!-- /.input group -->
	              	</div>
					<div class="form-group">
						<button type="submit" class="btn btn-sm btn-info pull-right">{{ isset($video) ? trans('lang.save') : trans('lang.create') }}</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@stop

@section('script')
	<!-- bootstrap datepicker -->
	<script src="{{ url('admin') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript">
		$(function(){
			//Date picker
			$('#datepicker').datepicker({
			  autoclose: true
			})
		})
	</script>
@stop