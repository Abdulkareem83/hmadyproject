<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterCtrl extends Controller
{
    //
    private $mainTitle = "chapters";

    /**
     * index. to show all chapters in specific course
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function index($courseId)
    {
    	$mainTitle = $this->mainTitle;
 		$title = "chaptersIn";
 		$course = Course::where('teacher_id', Auth::user()->id)
 					->where('id', $courseId)
 					->first();
 		if (is_null($course)) {
 			return redirect('/');
 		}

    	$chapters = Chapter::join('courses', 'courses.id', '=', 'chapters.course_id')
    					->select('chapters.id', 'chapters.name', 'chapters.description', 'courses.name as course')
    					->where('courses.teacher_id', '=', Auth::user()->id)
    					->where('courses.id', $courseId)
    					->get();
    	return view('admin.chapters.index')
    			->with(compact('mainTitle', 'title', 'courseId', 'chapters', 'course'));
    }
    

    /**
     * create. To show create chapter page.
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function create($courseId)
    {
    	$mainTitle = $this->mainTitle;
    	$title = "addNewChapter";

    	if (is_null(Course::find($courseId))) {
    		return redirect('/');
    	}
    	
    	return view('admin.chapters.create')
    			->with(compact('mainTitle', 'title', 'courseId'));
    	
    }
    
    /**
     * storeChapter. To store the chapter
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function storeChapter(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'name'	=> 'required|max:255',
    			'description' => 'required',
    			'courseId'	=> 'required|exists:courses,id'
    		]);
    	if($validator->fails()){
    		return redirect()->back()
    				->withInput()
    				->withErrors($validator);
    	}else{
    		$this->_storeChapter($request);
    		return redirect('chapters/all/'. $request->courseId)
    				->with('success', 'missionCompleted');
    	}
    }
    
    /**
     * editChapter. To show edit chapter page
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function editChapter($id, Request $request)
    {
    	$mainTitle = $this->mainTitle;
    	$title = "editChapter";
    	$chapter = Chapter::join('courses', 'courses.id', '=', 'chapters.course_id')
    				->select('chapters.*')
    				->where('courses.teacher_id', '=', Auth::user()->id)
    				->where('chapters.id', '=', $id)
    				->first();
    	if( is_null($chapter) ){
    		return redirect('/');
    	}
    	return view('admin.chapters.create')
    			->with(compact('mainTitle', 'title', 'chapter'));
    }
    
    /**
     * saveChapter. To save the edited chapter
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function saveChapter(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'name'	=> 'required|max:255',
    			'description' => 'required',
    			'courseId' => 'required|exists:courses,id',
    			'id'	=> 'required|exists:chapters,id'
    		]);
    	if($validator->fails()){
    		return redirect()->back()
    				->withInput()
    				->withErrors($validator);
    	}else{
    		$this->_storeChapter($request);
    		return redirect()->back()
    				->with('success', 'missionCompleted');
    	}
    }

    /**
     * deleteChapter. To delete a chapter from database
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function deleteChapter(Request $request)
    {
    	if ($request->has('id') && $request->has('token')) {
    	    $chapter = Chapter::join('courses', 'courses.id', '=', 'chapters.course_id')
    	    			->where('courses.teacher_id', '=', Auth::user()->id)
    	    			->where('chapters.id', '=', $request->id)
    	    			->first();
    	    if ($request->token == session('_token') && $chapter != null) {
    	    	
    	    	Chapter::find($request->id)->delete();
    	        return redirect()->back()
    	                       ->with('success', 'missionCompleted');
    	    }
    	}
    }
    	

    /**
     * _storeChapter. To store chapter into database
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    private function _storeChapter($request)
    {
    	if( $request->has('id') ){
    		$chapter = Chapter::find($request->id);
    	}else{
    		$chapter = new Chapter();
    	}

    	$chapter->name = $request->name;
    	$chapter->description = $request->description;
    	$chapter->course_id = $request->courseId;
    	$chapter->save();
    }
}
