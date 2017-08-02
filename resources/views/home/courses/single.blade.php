@extends('layouts.homeLayout')

@section('content')
	<section>
	  	<div class="container">
	    	<div class="row">
	      		<div class="col-md-8 blog-pull-right">
			        <div class="single-service">
			        	@if ($course->introVideo())
			        		<div class="fluid-video-wrapper">
			        			{!! $course->introVideo()->link !!}
			        		</div>
			        	@else
			          		<img src="{{ $course->picture }}" alt="{{ $course->name }}">
			          	@endif
			          	<h3 class="text-theme-colored">{{ $course->name }}</h3>
			          	<p>
			          		{{ $course->description }}
			          	</p>
			         </div>
			    </div>
		      	<div class="col-sm-12 col-md-4">
			        <div class="sidebar sidebar-left mt-sm-30 ml-40">
			          	<div class="widget">
			            	<h4 class="widget-title line-bottom">{{ trans('lang.content') }}<span class="text-theme-color-2"> {{ trans('lang.course') }}</span></h4>
			            	<div id="coursecontentAccordion" class="panel-group accordion">
				            	@foreach ($course->chapters as $key => $chapter)
	            	                <div class="panel">
	            	                  	<div class="panel-title"> 
	            	                  		<a class="{{ $key ? '' : 'active'}}" data-parent="#coursecontentAccordion" data-toggle="collapse" href="#accordion{{$chapter->id}}" aria-expanded="{{ $key ? '' : 'true'}}">
	            	                  			<span class="open-sub"></span> {{ $chapter->name }}
	            	                  		</a> 
	            	                  	</div>
	            	                  	<div id="accordion{{$chapter->id}}" class="panel-collapse collapse {{ $key ? '' : 'in'}}" role="tablist" aria-expanded="{{ $key ? '' : 'true'}}">
					            			<ul class="list-group">
					            				@foreach ($chapter->videos as $video)
					            					<li class="list-group-item">
					            						<a href="#" class="video-name" data-link='{{$video->link}}'>
						            						{{ $video->name }}
					            						</a>
					            					</li>
					            				@endforeach
					            			</ul>
				            	        </div>
				            	    </div>
					            @endforeach
        	              	</div>
					    </div>
			        </div>
		      	</div>
	    	</div>
	  	</div>
	</section>
@stop

@section('script')
	<script type="text/javascript">
		$('body').on('click', '.video-name', function(){
			var link = $(this).attr('data-link');
			$('.fluid-video-wrapper').html(link);
			return false;
		})
	</script>
@stop