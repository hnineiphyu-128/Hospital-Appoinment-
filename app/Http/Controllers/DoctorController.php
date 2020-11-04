<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Doctor;
use App\Speciality;
use App\Schedule;
use App\Patient;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::all();
        $specialities = Speciality::all();
        return view('backend.doctor.list',compact('doctors','specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specialities = Speciality::all();
        return view('backend.doctor.create',compact('specialities'));
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
        // dd($request->speciality_id);
        $validator=$request->validate([
            'name' => ['required','string','max:255'],
            'profile' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'speciality_id' => 'required|numeric|min:0|not_in:0'
        ]);

        if($validator)
        {
            $name=$request->name;
            $profile=$request->profile;
            $language=$request->language;
            $qualification=$request->qualification;
            $phone=$request->phone;
            $email=$request->email;
            $password=$request->password;
            $cost=$request->cost;
            $speciality_id=$request->speciality_id;
            //$extension = \File::extension($profile);
            // dd($foo = \File::extension($profile));

            $imageName=time().'.'.$profile->extension();
            $path = public_path('/images/doctor');
            $profile->move($path,$imageName);

            $filepath='/images/doctor/'.$imageName;

            // dd(Hash::make($password));
            //Data insert
            $user = new User;
            $user->name=$name;
            $user->email=$email;
            $user->password=Hash::make($password);
            $user->save();

            $user->assignRole('doctor');
            $user_id = $user->id;

            $doctor = new Doctor;
            //name | profile => table column name
            $doctor->user_id=$user_id;
            $doctor->profile=$filepath;
            $doctor->language=$language;
            $doctor->qualification=$qualification;
            $doctor->phone=$phone;
            $doctor->cost=$cost;
            $doctor->speciality_id=$speciality_id;
            $doctor->save();

            
            

            return redirect()->route('admin.doctor.index')->with('successMsg','New Doctor is ADDED in your data');
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
        // dd($id);
        $doctor = Doctor::find($id);
        $schedules = Schedule::where('doctor_id',$id)->get();
        $patient_count = Patient::where('doctor_id',$id)->count();
        $today = Date('Y-m-d');
        // dd($today);
        $today_count = Patient::where('created_at','like',$today.'%')->where('doctor_id',$id)->count();
        // dd($appoinment_count);
        return view('backend.doctor.detail',compact('doctor','schedules','patient_count','today_count'));
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
        $doctor = Doctor::find($id);
        $specialities = Speciality::all();
        return view('backend.doctor.edit',compact('doctor','specialities'));
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
        // dd($request->password);
        $validator=$request->validate([
            'name' => ['required','string','max:255'],
            'speciality_id' => 'required|numeric|min:0|not_in:0'
        ]);

        if($validator)
        {
            $speciality_id=$request->speciality_id;
            $id=$request->id;
            $user_id=$request->user_id;
            $name=$request->name;
            $oldProfile=$request->oldProfile;
            $newProfile=$request->profile;
            $language=$request->language;
            $qualification=$request->qualification;
            $phone=$request->phone;
            $email=$request->email;
            $doctor_email=$request->doctor_email;
            // dd($doctor_email);
            $password=$request->password;
            // if (Hash::needsRehash($password)) {
            //     $hashed = Hash::make('123456789');
            //     dd($hashed);
            // }
            // dd($password);
            $cost=$request->cost;
            // dd($user_id);
            // $address=$request->address;
            //$extension = \File::extension($profile);
            // dd($foo = \File::extension($profile));

            if($request->hasFile('profile')){
            //file upload
                $imageName=time().'.'.$newProfile->extension();

                $newProfile->move(public_path('/images/doctor'),$imageName);

                $filepath='/images/doctor/'.$imageName;

                if(\File::exists(public_path($oldProfile))){
                    \File::delete(public_path($oldProfile));
                }


            }else{
                $filepath=$oldProfile;
            }
            //Data insert

            $user = User::find($user_id);
            // dd($user);
            $user->name=$name;
            $user->email=$email;
            $user->password=$password;

            $user->save();

            $doctor = Doctor::find($id);
            //name | profile => table column name
            $doctor->user_id=$user_id;
            $doctor->profile=$filepath;
            $doctor->language=$language;
            $doctor->qualification=$qualification;
            $doctor->phone=$phone;
            $doctor->cost=$cost;
            $doctor->speciality_id=$speciality_id;
            $doctor->save();

            
            
            return redirect()->route('admin.doctor.index')->with('successMsg','Well Done! Doctor is Update');
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
        $doctor = Doctor::find($id);
        $user_id = $doctor->user_id;
        $user = User::find($user_id);

        $user->delete();
        $doctor->delete();

        return redirect()->route('admin.doctor.index')->with('successMsg','Existing Doctor is DELETED from your data');
    }
}
