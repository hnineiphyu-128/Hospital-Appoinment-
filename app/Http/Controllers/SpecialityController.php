<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speciality;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $specialities = Speciality::all();
        return view('backend.speciality.list',compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('backend.speciality.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'unique:specialities'
        $validator=$request->validate([
            'name' => ['required','string','max:255']
        ]);

        if($validator)
        {
            $name=$request->name;

            //Data insert
            $speciality = new Speciality;
            //name => table column name
            $speciality->name=$name;
            $speciality->save();

            return redirect()->route('admin.speciality.index')->with('successMsg','New Speciality is ADDED in your data');
        }else{
            return redirect::back()->withErrors($validator);
        }
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
        $speciality = Speciality::find($id);
        return view('backend.speciality.edit',compact('speciality'));
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
        $validator=$request->validate([
            'name' => ['required','string','max:255']
        ]);

        if($validator)
        {
            $name=$request->name;

            // $logo=$request->logo;


            // $imageName=time().'.'.$logo->extension();

            // $logo->move(public_path('images/brand'),$imageName);

            // $filepath='images/brand/'.$imageName;

            //Data insert
            $speciality = Speciality::find($id);
            //name | logo table column name
            $speciality->name=$name;
            // $speciality->logo=$filepath;
            $speciality->save();

            return redirect()->route('admin.speciality.index')->with('successMsg','Well Done! Your Speciality is Updated.');
        }else{
            return redirect::back()->withErrors($validator);
        }
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
        $speciality = Speciality::find($id);
        $speciality->delete();

        return redirect()->route('admin.speciality.index')->with('successMsg','Existing Speciality is DELETED in your data');
    }
}
