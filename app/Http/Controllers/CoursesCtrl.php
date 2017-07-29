<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesCtrl extends Controller
{
    //
    private $mainTitle;

    function __construct()
    {
    	$this->mainTitle = "courses";
    }
    /**
     * index. To show all courses page
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function index()
    {
    	$mainTitle = $this->mainTitle;
    	$title = "allCourses";
    	$courses = Course::where('teacher_id', '=', Auth::user()->id)
    				->get();

    	return view('admin.courses.index')
    			->with(compact('mainTitle', 'title', 'courses'));
    }
    
    /**
     * createCourse. To show create course page
     *
     * @return \Illuminate\Http\Response
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function createCourse()
    {
    	$mainTitle = $this->mainTitle;
    	$title = "addNewCourse";

    	return view('admin.courses.create')
    		->with(compact('mainTitle', 'title'));
    }

    /**
     * storeCourse. To store the course
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function storeCourse(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'name'	=> 'required|max:255',
    			'description' => 'required',
    			'picture'	=> 'required|image'
    		]);
    	if($validator->fails()){
    		return redirect()->back()
    				->withInput()
    				->withErrors($validator);
    	}else{
    		$this->_storeCourse($request);
    		return redirect('courses/all')
    				->with('success', 'missionCompleted');
    	}
    }
    
    /**
     * editCourse. To show edit course page
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function editCourse($id, Request $request)
    {
    	$mainTitle = $this->mainTitle;
    	$title = "editCourse";
    	$course = Course::where('teacher_id', '=', Auth::user()->id)
    				->where('id', '=', $id)
    				->first();
    	if( is_null($course) ){
    		return redirect('/');
    	}
    	return view('admin.courses.create')
    			->with(compact('mainTitle', 'title', 'course'));
    }
    
    /**
     * saveCourse. To save the edited course
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function saveCourse(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'name'	=> 'required|max:255',
    			'description' => 'required',
    			'picture' => 'image',
    			'id'	=> 'required|exists:courses,id'
    		]);
    	if($validator->fails()){
    		return redirect()->back()
    				->withInput()
    				->withErrors($validator);
    	}else{
    		$this->_storeCourse($request);
    		return redirect()->back()
    				->with('success', 'missionCompleted');
    	}
    }

    /**
     * deleteCourse. To delete a course from database
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function deleteCourse(Request $request)
    {
    	if ($request->has('id') && $request->has('token')) {
    	    $course = Course::where('id', '=', $request->id)
    	    			->where('teacher_id', '=', Auth::user()->id)
    	    			->first();
    	    if ($request->token == session('_token') && $course != null) {
    	    	$course->delete();
    	        return redirect()->back()
    	                       ->with('success', 'missionCompleted');
    	    }
    	}
    }
    	
    /**
     * showCourse. To show the course
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Smart Applications Co. <www.smartapps-ye.com>
     */
    public function showCourse($id)
    {
    	$dontTranslateTitle = true;
    	$mainTitle = $this->mainTitle;
    	$course = Course::find($id);

    	if (is_null($course)) {
    		return redirect('/');
    	}
    	$title = $course->name;
    	return view('admin.courses.show')
    			->with(compact('mainTitle', 'title', 'course', 'dontTranslateTitle'));
    }

    /**
     * showCoursesPage. To show courses page
     *
     * @param 
     * @return \Illuminate\Http\Response
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Smart Applications Co. <www.smartapps-ye.com>
     */
    public function showCoursesPage()
    {
        $mainTitle = "courses";
        $title = "all courses";
        $courses = Course::paginate(10);
        return view('home.courses.index')
                ->with(compact('title', 'mainTitle', 'courses'));
    }

    /**
     * showSingleCoursePage. To show single courses page.
     *
     * @param 
     * @return \Illuminate\Http\Response
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Smart Applications Co. <www.smartapps-ye.com>
     */
    public function showSingleCoursePage($id)
    {
        $mainTitle = "courses";
        $title = "all courses";
        $course = Course::find($id);
        return view('home.courses.single')
                ->with(compact('title', 'mainTitle', 'course'));
    }


    /**
     * _storeCourse. To store course into database
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    private function _storeCourse($request)
    {
    	if( $request->has('id') ){
    		$course = Course::find($request->id);
    	}else{
    		$course = new Course();
    	}
    	if ($request->hasFile('picture')) {
	    	$course->picture = uploadFile($request->picture);
    	}

    	$course->name = $request->name;
    	$course->description = $request->description;
    	$course->teacher_id = Auth::user()->id;
    	$course->save();
    }
    
}
