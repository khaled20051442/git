<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use File;
class ClientController extends Controller
{


protected $object;
    public function __construct(Client $object)
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
        $rows=Client::all();
        return view('admin.client.index',compact('rows'));
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
        $inputs=[
            'client_name' =>$request->input('client_name'),
            'client_website'=>$request->input('client_website'),
        ];
        if($request->input('client') =='on'){
$inputs['active']=1;
    }else{
        $inputs['active']=0; 
    }
  
    if($request->file('pic')){
        $image=$request->file('pic');
        $inputs['client_logo_url']=$this->UplaodImage($image);
    }
$this->object::create($inputs);
return redirect()->route('client.index')->with('flash_success','object has been saved');
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
        $client=Client::where('id','=',$id)->first();
        return view('admin.client.edit',compact('client'));
       
        //
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
        $inputs=[
            'client_name' =>$request->input('client_name'),
            'client_website'=>$request->input('client_website'),
        ];
        if($request->input('client') =='on'){
$inputs['active']=1;
    }else{
        $inputs['active']=0; 
    }
  
    if($request->file('pic')){
        $image=$request->file('pic');
        $inputs['client_logo_url']=$this->UplaodImage($image);
    }
$this->object::findOrFail($id)->update($inputs);
return redirect()->route('client.index')->with('flash_success','object has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
     
        $client=Client::where('id','=',$id)->first();
        $file=$client->client_logo_url;
        $file_name= public_path('uploads/clients'.$file);
        File::delete($file_name);
        $client->delete();
        return redirect()->route('client.index')->with('flash_dunger','object has been deleted');
    }
}
