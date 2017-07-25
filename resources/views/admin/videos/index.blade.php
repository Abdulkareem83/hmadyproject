@extends('layouts.adminLayout')

@section('content')
	<section class="all-videos-section">
		<div class="box box-info">
			<div class="box-header with-border">
				<div class="caption pull-left">
					{{ trans('lang.'.$title) }} <em>({{ $chapter->name }})</em> 
				</div>
				<div class="pull-right">
					<a class="btn btn-sm btn-info" href="{{ route('create-video', ['chapterId' => $chapter->id]) }}">
						{{ trans('lang.addNewVideo') }}
					</a>
				</div>
			</div>
			<div class="box-body">
				@if (count($videos))
					<div class="table-responsive">
						<table class="table table-bordered table-stripped">
							<thead>
								<tr>
									<th>#</th>
									<th>{{ trans('lang.name') }}</th>
									<th>{{ trans('lang.link') }}</th>
									<th>{{ trans('lang.chapter') }}</th>
									<th class="mw125">
										{{ trans('lang.actions') }}
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($videos as $key => $video)
									<tr>
										<td>
											{{ $key + 1 }}
										</td>
										<td>
											{{ $video->name }}
										</td>
										<td>
											{{ $video->link }}
										</td>
										<td>
											{{ $video->chapter }}
										</td>
										<td>
											<div class="btn-group">
												<a title="{{ trans('lang.edit') }}" class="btn btn-info btn-sm" href="{{ route('edit-video', ['id' => $video->id]) }}"><i class="fa fa-edit"></i></a>
												<a title="{{ trans('lang.delete') }}" class="btn btn-danger btn-sm" href='{{ url("videos/delete?id={$video->id}&token=".csrf_token()) }}'><i class="fa fa-trash"></i></a>
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
