<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCtrl extends Controller
{
    //
    //
    private $mainTitle;

    function __construct()
    {
    	$this->mainTitle = "categories";
    }
    /**
     * index. To show all categories page
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function index()
    {
    	$mainTitle = $this->mainTitle;
    	$title = "allCategories";
    	$categories = Category::all();

    	return view('admin.categories.index')
    			->with(compact('mainTitle', 'title', 'categories'));
    }
    
    /**
     * createCategory. To show create category page
     *
     * @return \Illuminate\Http\Response
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function createCategory()
    {
    	$mainTitle = $this->mainTitle;
    	$title = "addNewCategory";

    	return view('admin.categories.create')
    		->with(compact('mainTitle', 'title'));
    }

    /**
     * storeCategory. To store the category
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function storeCategory(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'name'	=> 'required|max:255'
    		]);
    	if($validator->fails()){
    		return redirect()->back()
    				->withInput()
    				->withErrors($validator);
    	}else{
    		$this->_storeCategory($request);
    		return redirect()->route('all-categories')
    				->with('success', 'missionCompleted');
    	}
    }

    /**
     * deleteCategory. To delete a category from database
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    public function deleteCategory(Request $request)
    {
    	if ($request->has('id') && $request->has('token')) {
    	    $category = Category::where('id', '=', $request->id)
    	    			->first();
    	    if ($request->token == session('_token') && $category != null) {
    	    	$category->delete();
    	        return redirect()->back()
    	                       ->with('success', 'missionCompleted');
    	    }
    	}
    }

    /**
     * _storeCategory. To store category into database
     *
     * @param 
     * @return 
     * @author Abdulkareem Mohammed <a.esawy.sapps@gmail.com>
     * @copyright Hamdy Soltan.
     */
    private function _storeCategory($request)
    {
    	$category = new Category();
    	$category->name = $request->name;
    	$category->save();
    }
}
