@extends('layouts.adminLayout')

@section('content')
	<section class="show-course-section">
		<div class="box box-info">
			<div class="box-header with-border">
				<div class="caption pull-left">
					{{ $title }}
				</div>
				<div class="pull-right">
					<a class="btn btn-info btn-sm" href="{{ route('add-new-chapter', ['courseId' => $course->id]) }}">
						{{ trans('lang.addNewChapter') }}
					</a>
				</div>
			</div>
			<div class="box-body">
				<section>
					<header>
						<h3>
							{{ $course->name }}
						</h3>
					</header>
					<div>
						<img class="img-responsive" src="{{ $course->picture  }}">
						{{ $course->description }}
					</div>
				</section>
			</div>
		</div>
	</section>
@stop