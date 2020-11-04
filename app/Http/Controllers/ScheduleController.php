<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Doctor;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $schedules = Schedule::all();
        return view('backend.schedule.list',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $doctors = Doctor::all();
        return view('backend.schedule.create',compact('doctors'));
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
        $validator=$request->validate([
            'doctor_id' => 'required|numeric|min:0|not_in:0'
        ]);

        if($validator)
        {
            $day=$request->day;
            $time=$request->time;
            $doctor_id=$request->doctor_id;

            //Data insert
            $schedule = new Schedule;
            $schedule->day = $day;
            $schedule->time = $time;
            $schedule->doctor_id = $doctor_id;

            $schedule->save();
            

            return redirect()->route('admin.schedule.index')->with('successMsg','New Schedule is ADDED in your data');
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
        // dd($id);
        $schedule = Schedule::find($id);
        $doctors = Doctor::all();
        return view('backend.schedule.edit',compact('schedule','doctors'));
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
            'doctor_id' => 'required|numeric|min:0|not_in:0'
        ]);

        if($validator)
        {
            $day=$request->day;
            $time=$request->time;
            $doctor_id=$request->doctor_id;

            //Data insert
            $schedule = Schedule::find($id);
            $schedule->day = $day;
            $schedule->time = $time;
            $schedule->doctor_id = $doctor_id;

            $schedule->save();
            

            return redirect()->route('admin.schedule.index')->with('successMsg','Well Done! Schedule is UPDATED');
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
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->route('admin.doctor.index')->with('successMsg','Existing Schedule is DELETED from your data');
    }
}
