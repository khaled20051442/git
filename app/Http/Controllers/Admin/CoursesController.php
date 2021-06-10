<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Course;
use App\models\CourseCategory;
use App\models\CourseSubCategory;
use File;


class CoursesController extends Controller
{

    protected $object;
    public function __construct(Course $object)
    {
        $this->middleware('auth');
        $this->object=$object;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows=Course::where('active' ,"=",1)->get();
        return view('admin.courses.index',compact('rows'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=CourseCategory::where('active' ,"=",1)->get();
        $subs=CourseSubCategory::where('active' ,"=",1)->get();
        return view('admin.courses.add',compact('subs','cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ab-100
        $maxValue=100;

        if($request->input('course_sub_category_id'))
$maxValue=Course::where('course_sub_category_id','=',$request->input('course_sub_category_id'))->orderBy('id','desc')->value('course_code');

  $cat=CourseSubCategory::where('id','=',$request->input('course_sub_category_id'))->first();

  $max=substr($maxValue,strlen($cat->subcategory_code));
  if($max>=100){
$max=$max+1;
$courseCode=$cat->subcategory_code.$max;

  }else{
    $max=100;
    $courseCode=$cat->subcategory_code.$max;
  }

  $data=[
    'course_code'=>$courseCode,
    'course_en_name'=>$request->input('course_en_name'),
    'course_en_desc'=>$request->input('course_en_desc'),
    'course_duration'=>$request->input('course_duration'),
    'Accreditation'=>$request->input('Accreditation'),
    'course_highlight'=>$request->input('course_highlight'),
    'course_objectives'=>$request->input('course_objectives'),
    'course_audience'=>$request->input('course_audience'),
    'course_training_methods'=>$request->input('course_training_methods'),
    'course_daily_agenda'=>$request->input('course_daily_agenda'),
    'active' =>1,
    
                ];

                if($request->input('course_sub_category_id')){

                    $data['course_sub_category_id']=$request->input('course_sub_category_id');
                 }
               
                 if($request->hasFile('course_image'))
                 {
                    $course_image=$request->file('course_image');
           
                    $data['course_image'] = $this->UplaodImage($course_image);
    
                 }
                 if($request->hasFile('thumbnail'))
                 {
                     
                    $thumbnail=$request->file('thumbnail');
           
                    $data['course_image_thumbnail'] = $this->UplaodImage($thumbnail);
    
                 }

                 if($request->hasFile('fileDoc'))
                 {
                   
                    $fileDoc=$request->file('fileDoc');
           
                    $data['course_brochure'] = $this->UplaodFile($fileDoc);
    
                 }
  
   


                 $this->object::create($data);

                 return redirect()->route('courses.index')->with('flash_success', $this->message);




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats=CourseCategory::where('active' ,"=",1)->get();
        $subs=CourseSubCategory::where('active' ,"=",1)->get();
        $course=Course::where('id','=',$id)->first();
        return view('admin.courses.edit',compact('course','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=[
          
            'course_en_name'=>$request->input('course_en_name'),
            'course_en_desc'=>$request->input('course_en_desc'),
            'course_duration'=>$request->input('course_duration'),
            'Accreditation'=>$request->input('Accreditation'),
            'course_highlight'=>$request->input('course_highlight'),
            'course_objectives'=>$request->input('course_objectives'),
            'course_audience'=>$request->input('course_audience'),
            'course_training_methods'=>$request->input('course_training_methods'),
            'course_daily_agenda'=>$request->input('course_daily_agenda'),
         
            
                        ];
        
                        if($request->input('course_sub_category_id')){
        
                            $data['course_sub_category_id']=$request->input('course_sub_category_id');
                         }
                       
                         if($request->hasFile('course_image'))
                         {
                            $course_image=$request->file('course_image');
                   
                            $data['course_image'] = $this->UplaodImage($course_image);
            
                         }
                         if($request->hasFile('thumbnail'))
                         {
                             
                            $thumbnail=$request->file('thumbnail');
                   
                            $data['course_image_thumbnail'] = $this->UplaodImage($thumbnail);
            
                         }
        
                         if($request->hasFile('fileDoc'))
                         {
                           
                            $fileDoc=$request->file('fileDoc');
                   
                            $data['course_brochure'] = $this->UplaodFile($fileDoc);
            
                         }
          
           
        
        
                         $this->object::findOrFail($id)->update($data);
        
                         return redirect()->route('courses.index')->with('flash_success',"Object Has Been Updated");
        
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::where('id','=',$id)->first();
        $file1=$course->course_image_thumbnail;
        $file2=$course->course_image;
        $file3=$course->course_brochure;
        $file_name1= public_path('uploads/courses'.$file1);
        $file_name2= public_path('uploads/courses'.$file2);
        $file_name3= public_path('uploads/courseBrochure'.$file3);
        File::delete($file_name1);
        File::delete($file_name2);
        File::delete($file_name3);
        $course->delete();
        return redirect()->route('courses.index')->with('flash_dunger','object has been deleted');
    }


    /**
     * fech Data Subcategory
     */
    public function fetchData(Request $request){
        $id=$request->input('value');
        $data=CourseSubCategory::where('course_category_id','=',$id)->get();
        $out='<option value="">select ..</option>';
        foreach($data as $dd){
           
          $out .= "<option value='".$dd->id."'>".$dd->subcategory_en_name."</option>";
        }
        echo $out;
    
    }

/**
     * uplaud image
     */
    public function UplaodImage($file_request)
	{
		//  This is Image Info..
		$file = $file_request;
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$size = $file->getSize();
		$path = $file->getRealPath();
		$mime = $file->getMimeType();


		// Rename The Image ..
		$imageName = $name;
		$uploadPath = public_path('uploads/courses');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
    /**
     * uplaud file
     */
    public function UplaodFile($file_request)
	{
		//  This is Image Info..
		$file = $file_request;
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$size = $file->getSize();
		$path = $file->getRealPath();
		$mime = $file->getMimeType();


		// Rename The Image ..
        $imageName = $name;
      
		$uploadPath = public_path('uploads/courseBrochure');
		
		// Move The image..
		  $file->move($uploadPath, $imageName);
     
        //  Storage::put('public/uploads/courseBrochure', $imageName);
        // $filename =$imageName->store('/public/uploads',['disk' => 'public']);
        return $imageName;
    }


}




