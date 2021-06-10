<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\Country;

class VenueController extends Controller
{


    public function __construct(Venue $object)
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
$venues=Venue::all();
$countries=Country::all();
return view('admin.venue.index',compact('venues','countries'));
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
        $input=[
            'venue_en_name'=> $request->input('venue_en_name'),
'country_id'=>$request->input('country_id'),
        ];
        Venue::create($input);
        return redirect()->route('venue.index')->with('flash_success',"saved done sussecfully");

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
        $venue =Venue::where('id', '=', $id)->first();
       
        $countries=Country::all();

        return view('admin.venue.edit',compact('venue','countries'));
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
        $row=Venue::where('id','=',$id)->first();
        $input=[
            'venue_en_name'=> $request->input('venue_en_name'),
'country_id'=>$request->input('country_id'),
        ];
       $row->update($input);
        return redirect()->route('venue.index')->with('flash_success',"saved done sussecfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row=Venue::where('id','=',$id)->first();
        $row->delete();
        return redirect()->route('venue.index')->with('flash_dunger','object has been deleted');

    }
}
