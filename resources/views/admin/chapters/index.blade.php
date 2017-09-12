@extends('layouts.adminLayout')

@section('content')
	<section class="show-course-section">
		<div class="box box-info">
			<div class="box-header with-border">
				<div class="caption pull-left">
					{{ trans('lang.'.$title) }} <em>({{ $course->name }}) .</em> 
				</div>
				<div class="pull-right">
					<a class="btn btn-sm btn-info" href="{{ route('all-courses') }}">
						{{ trans('lang.allCourses') }}
					</a>
					<a class="btn btn-sm btn-info" href="{{ route('create-chapter', ['courseId' => $course->id]) }}">
						{{ trans('lang.addNewChapter') }}
					</a>
				</div>
			</div>
			<div class="box-body">
				@if (count($chapters))
					<div class="table-responsive">
						<table class="table table-bordered table-stripped">
							<thead>
								<tr>
									<th>#</th>
									<th>{{ trans('lang.name') }}</th>
									<th>{{ trans('lang.description') }}</th>
									<th>{{ trans('lang.videos') }}</th>
									<th>{{ trans('lang.course') }}</th>
									<th class="mw125">
										{{ trans('lang.actions') }}
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($chapters as $key => $chapter)
									<tr>
										<td>
											{{ $key + 1 }}
										</td>
										<td>
											{{ $chapter->name }}
										</td>
										<td>
											{{ $chapter->description }}
										</td>
										<td>
											<a class="btn btn-sm btn-warning" href="{{ route('all-videos', ['chapterId' => $chapter->id]) }}">
												{{ trans('lang.videos') }}
											</a>
										</td>
										<td>
											{{ $chapter->course }}
										</td>
										<td>
											<div class="btn-group">
												<a title="{{ trans('lang.addNewVideo') }}" class="btn btn-success btn-sm" href='{{ route("create-video", ['chapterId' => $chapter->id]) }}'><i class="fa fa-plus"></i></a>
												<a title="{{ trans('lang.edit') }}" class="btn btn-info btn-sm" href="{{ route('edit-chapter', ['id' => $chapter->id]) }}"><i class="fa fa-edit"></i></a>
												<a title="{{ trans('lang.delete') }}" class="btn btn-danger btn-sm" href='{{ url("chapters/delete?id={$chapter->id}&token=".csrf_token()) }}'><i class="fa fa-trash"></i></a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@endif	
			</div>
		</div>
	</section>
@stop
