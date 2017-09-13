@extends('layouts.adminLayout')

@section('content')
	<section class="all-categories-section">
		<div class="box box-info">
			<div class="box-header with-border">
				{{ trans("lang.".$title) }}
				<div class="pull-right">
					<a class="btn btn-sm btn-info" href="{{ route('create-category') }}">
						{{ trans('lang.addNewCategory') }}
					</a>
				</div>
			</div>
			<div class="box-body">
				@if (count($categories))
					<div class="table-responsive">
						<table class="table table-bordered table-stripped">
							<thead>
								<tr>
									<th>#</th>
									<th>{{ trans('lang.name') }}</th>
									<th class="mw125">
										{{ trans('lang.actions') }}
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($categories as $key => $category)
								<tr>
									<td>
										{{ $key + 1 }}
									</td>
									<td>
										{{ $category->name }}
									</td>
									<td>
										<div class="btn-group">
											<a title="{{ trans('lang.delete') }}" class="btn btn-danger btn-sm" href='{{ url("categories/delete?id={$category->id}&token=".csrf_token()) }}'><i class="fa fa-trash"></i></a>
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