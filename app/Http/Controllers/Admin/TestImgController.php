<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ImageGallery;

class TestImgController extends Controller
{


    protected $object;
    public function __construct(ImageGallery $object)
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

        $rows=ImageGallery::all();
        return view('admin.testimg.index',compact('rows'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
 //
 $inputs=[
    'order' =>$request->input('order'),
];
if($request->input('client') =='on'){
$inputs['active']=1;
}else{
$inputs['active']=0; 
}

if($request->file('pic')){
$image=$request->file('pic');
$inputs['image_path']=$this->UplaodImage($image);
}
$this->object::create($inputs);
return redirect()->route('testImg.index')->with('flash_success','object has been saved');
}

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
$imageName =$name;
$uploadPath = public_path('uploads/testimg');

// Move The image..
$file->move($uploadPath, $imageName);

return $imageName;



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
        //

        $row=ImageGallery::where('id','=',$id)->first();
        return view('admin.testImg.edit',compact('row'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
