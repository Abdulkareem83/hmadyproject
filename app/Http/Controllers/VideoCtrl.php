<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use Carbon\Carbon;
use App\Models\Video;
use App\Models\Chapter;
use Illuminate\Http\Request;

class VideoCtrl extends Controller
{
    //
    private $mainTitle = "videos";

   /**
    * index. to show all videos in specific chapter
    *
    * @param 
    * @return 
    * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
    * @copyright Hamdy Soltan.
    */
   public function index($chapterId)
   {
   		$mainTitle = $this->mainTitle;
		$title = "videosIn";
		$chapter = Chapter::join('courses', 'courses.id', '=', 'chapters.course_id')
					->select('chapters.*')
					->where('courses.teacher_id', '=', Auth::user()->id)
					->where('chapters.id', $chapterId)
					->first();
		if (is_null($chapter)) {
			return redirect('/');
		}

   		$videos = Video::join('chapters', 'chapters.id', '=', 'videos.chapter_id')
   					->join('courses', 'courses.id', '=', 'chapters.course_id')
   					->select('videos.*', 'chapters.name as chapter')
   					->where('courses.teacher_id', '=', Auth::user()->id)
   					->where('chapters.id', $chapterId)
   					->get();
   		return view('admin.videos.index')
   			->with(compact('mainTitle', 'title', 'chapterId', 'videos', 'chapter'));
   }       

    /**
     * create. To show create video page
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function create($chapterId)
    {
    	$mainTitle = $this->mainTitle;
    	$title = 'addNewVideo';

    	$chapter = Chapter::join('courses', 'courses.id', '=', 'chapters.course_id')
    				->where('courses.teacher_id', '=', Auth::user()->id)
    				->where('chapters.id', '=', $chapterId)
    				->first();
    	if (is_null($chapter)) {
    		return redirect('/');
    	}
    	
    	return view('admin.videos.create')
    			->with(compact('mainTitle', 'title', 'chapterId'));
    }

    /**
     * storeVideo. To store the video
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function storeVideo(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'name'	=> 'required|max:255',
    			'link' => 'required',
    			'chapterId'	=> 'required|exists:chapters,id',
                'created_at' => 'required|date_format:m/d/Y'
    		]);
    	if($validator->fails()){
    		return redirect()->back()
    				->withInput()
    				->withErrors($validator);
    	}else{
    		$this->_storeVideo($request);
    		return redirect('videos/all/'.$request->chapterId)
    				->with('success', 'missionCompleted');
    	}
    }
    
    /**
     * editVideo. To show edit video page
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function editVideo($id, Request $request)
    {
    	$mainTitle = $this->mainTitle;
    	$title = "editVideo";
    	$video = Video::join('chapters', 'chapters.id', '=', 'videos.chapter_id')
    				->join('courses', 'courses.id', '=', 'chapters.course_id')
    				->select('videos.*')
    				->where('courses.teacher_id', '=', Auth::user()->id)
    				->where('videos.id', '=', $id)
    				->first();
    	if( is_null($video) ){
    		return redirect('/');
    	}
    	return view('admin.videos.create')
    			->with(compact('mainTitle', 'title', 'video'));
    }
    
    /**
     * saveVideo. To save the edited video
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function saveVideo(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'name'	=> 'required|max:255',
    			'link' => 'required',
    			'chapterId' => 'required|exists:chapters,id',
    			'id'	=> 'required|exists:videos,id',
                'created_at' => 'required|date_format:m/d/Y'
    		]);
    	if($validator->fails()){
    		return redirect()->back()
    				->withInput()
    				->withErrors($validator);
    	}else{
    		$this->_storeVideo($request);
    		return redirect()->back()
    				->with('success', 'missionCompleted');
    	}
    }

    /**
     * deleteVideo. To delete a video from database
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function deleteVideo(Request $request)
    {
    	if ($request->has('id') && $request->has('token')) {
    	    $video = Video::join('chapters', 'chapters.id', '=', 'videos.chapter_id')
    	    			->join('courses', 'courses.id', '=', 'chapters.course_id')
    	    			->where('courses.teacher_id', '=', Auth::user()->id)
    	    			->where('videos.id', '=', $request->id)
    	    			->first();
    	    if ($request->token == session('_token') && $video != null) {
    	    	
    	    	Video::find($request->id)->delete();
    	        return redirect()->back()
    	                       ->with('success', 'missionCompleted');
    	    }
    	}
    }
    	

    /**
     * _storeVideo. To store video into database
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    private function _storeVideo($request)
    {
    	if( $request->has('id') ){
    		$video = Video::find($request->id);
    	}else{
    		$video = new Video();
    	}

    	$video->name = $request->name;
    	$video->link = $request->link;
    	$video->chapter_id = $request->chapterId;
        $video->created_at = Carbon::createFromFormat('m/d/Y', $request->created_at)->toDateTimeString();
    	$video->save();
    }
}
