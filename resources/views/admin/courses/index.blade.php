@extends('layouts.adminLayout')

@section('content')
	<section class="all-courses-section">
		<div class="box box-info">
			<div class="box-header with-border">
				{{ trans("lang.".$title) }}
			</div>
			<div class="box-body">
				@if (count($courses))
					<div class="table-responsive">
						<table class="table table-bordered table-stripped">
							<thead>
								<tr>
									<th>#</th>
									<th>{{ trans('lang.name') }}</th>
									<th>{{ trans('lang.description') }}</th>
									<th>{{ trans('lang.chapters') }}</th>
									<th class="mw125">
										{{ trans('lang.actions') }}
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($courses as $key => $course)
								<tr>
									<td>
										{{ $key + 1 }}
									</td>
									<td>
										{{ $course->name }}
									</td>
									<td> {{ str_limit($course->description, 200) }} </td>
									<td>
										<a class="btn btn-warning btn-sm" href='{{ route('all-chapters', ['courseId' => $course->id]) }}'>{{ trans('lang.chapters') }}</a>
									</td>
									<td>
										<div class="btn-group">
											<a title="{{ trans('lang.addNewChapter') }}" class="btn btn-success btn-sm" href="{{ route('create-chapter', ['courseId' => $course->id]) }}"><i class="fa fa-plus"></i> </a>
											<a title="{{ trans('lang.edit') }}" class="btn btn-info btn-sm" href="{{ route('edit-course', ['id' => $course->id]) }}"><i class="fa fa-edit"></i></a>
											<a title="{{ trans('lang.delete') }}" class="btn btn-danger btn-sm" href='{{ url("courses/delete?id={$course->id}&token=".csrf_token()) }}'><i class="fa fa-trash"></i></a>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					{{ trans('lang.therIsNoRecords') }}
				@endif
			</div>
		</div>
	</section>
@stop