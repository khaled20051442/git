<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Testmonials;

class TestmonileController extends Controller
{


    protected $object;
    public function __construct(Testmonials $object)
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
$rows=Testmonials::all();
return view('admin.testmoline.index',compact('rows'));

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
    'reviewer_name' =>$request->input('reviewer_name'),
    'reviewer_star_rate'=>$request->input('rating'),
    'reviewer_text' =>$request->input('reviewer_text'),
];

$this->object::create($inputs);
return redirect()->route('testmonile.index')->with('flash_success','object has been saved');
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
$uploadPath = public_path('uploads/clients');

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
    $row=Testmonials::where('id' , '=', $id)->first();
    return view('admin.testmoline.edit',compact('row'));



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


        $inputs=[
            'reviewer_name' =>$request->input('reviewer_name'),
           
            'reviewer_text' =>$request->input('reviewer_text'),
        ];
     
        if($request->input('rating')){
            $inputs['reviewer_star_rate']=$request->input('rating');
        }
        
        $this->object::findOrFail($id)->update($inputs);
        return redirect()->route('testmonile.index')->with('flash_success','object has been saved');
        


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
        $row=Testmonials::where('id' , '=', $id)->first();
        $row->delete();
        return redirect()->route('testmonile.index')->with('flash_success','object has been deleted');





    }
}
