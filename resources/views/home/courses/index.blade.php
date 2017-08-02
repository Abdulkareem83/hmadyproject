@extends('layouts.homeLayout')

@section('content')
	<section>
	  <div class="container mt-30 mb-30 pt-30 pb-30">
	    <div class="row blog-posts">
	      <div class="col-md-12">
	        <!-- Blog Masonry -->
	        <div id="grid" class="gallery-isotope grid-3 masonry gutter-30 clearfix">
	          <!-- Blog Item Start -->
	         	@if (count($courses))
	         		@foreach ($courses as $course)
			          <div class="gallery-item">
			            <article class="post clearfix mb-30 bg-lighter">
			              <div class="entry-header">
			                <div class="post-thumb thumb"> 
			                  <img src="{{ $course->picture }}" height="255" alt="{{ $course->name }}" class="img-responsive img-fullwidth"> 
			                </div>
			              </div>
			              <div class="entry-content border-1px p-20 pl-10">
			                <div class="entry-meta media mt-0 no-bg no-border">
			                  <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pl-15 pb-5 pr-15">
			                    <ul>
			                      <li class="font-16 text-white font-weight-600">28</li>
			                      <li class="font-12 text-white text-uppercase">Feb</li>
			                    </ul>
			                  </div>
			                  <div class="media-body pr-15">
			                    <div class="event-content pull-left flip">
			                      	<h4 class="entry-title text-white text-uppercase m-0 mt-5">
			                      		<a href="{{ route('single-course', ['id' => $course->id]) }}">
			                      			{{ $course->name }}
			                      		</a>
			                      	</h4>
			                      <span class="mb-10 text-gray-darkgray ml-10 font-13">
			                      	<i class="fa fa-commenting-o ml-5 text-theme-colored"></i> 214 تعليق</span>                       
			                      <span class="mb-10 text-gray-darkgray ml-10 font-13">
			                      	<i class="fa fa-heart-o ml-5 text-theme-colored"></i> 895 اعجاب
			                      </span>                       
			                    </div>
			                  </div>
			                </div>
			                <p class="mt-10">
			                	{{ str_limit($course->description) }}
			                </p>
			                <a href="{{ route('single-course', ['id' => $course->id]) }}" class="btn-read-more">
			                	{{ trans('lang.more') }}
			                </a>
			                <div class="clearfix"></div>
			              </div>
			            </article>
			          </div>
			        @endforeach
		        @else
		        	{{ trans('lang.no_courses_yet') }}
		        @endif
			        
	          <!-- Blog Item End -->
	        </div>
	        <!-- Blog Masonry -->
	      </div>
	    </div>
	    <div class="row">
	      <div class="col-sm-12">
	      	{{ $courses->render() }}
	      </div>
	    </div>
	  </div>
	</section>
@stop