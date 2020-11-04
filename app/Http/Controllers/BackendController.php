<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Carbon\Carbon;
use App\Doctor;
use App\Schedule;
use App\Patient;
use App\Speciality;


class BackendController extends Controller
{
    //
    public function index()
    {
    	$today = Date('Y-m-d');
    	$appoinments = DB::table('appoinments')
    					 ->join('patients','patients.id','appoinments.patient_id')
    					 ->join('schedules','schedules.id','appoinments.schedule_id')
    					 ->select('appoinments.*', 'patients.name as p_name', 'patients.phone as p_phone', 'schedules.day as day', 'schedules.time as time')
    					 ->where('appoinments.created_at','like',$today.'%')
    					 ->get();
    	return view('backend.dashboard',compact('appoinments'));
    }

    public function doctor_page()
    {
        $today = Date('Y-m-d');
        $user = Auth::user();
        $user_id = $user->id;
        $doctor = Doctor::where('user_id',$user_id)->get();
        // dd($doctor);
        $doctor_id = $doctor[0]->id;
        $appoinments = DB::table('appoinments')
                         ->join('patients','patients.id','appoinments.patient_id')
                         ->join('schedules','schedules.id','appoinments.schedule_id')
                         ->select('appoinments.*', 'patients.name as p_name', 'patients.age as p_age', 'patients.phone as p_phone', 'schedules.day as day', 'schedules.time as time')
                         ->where('patients.doctor_id',$doctor_id)
                         ->where('appoinments.appoinment_Date','like',$today.'%')
                         ->get();
        
        // dd($schedules);
        return view('backend.doctor_page',compact('appoinments'));
    }

    public function doctor_profile()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $udoctor = Doctor::where('user_id',$user_id)->get();
        //dd($doctor);
        $doctor_id = $udoctor[0]->id;

        $doctor = Doctor::find($doctor_id);
        $specialities = Speciality::all();

        return view('backend.doctor_profile',compact('doctor','specialities'));
    }

    public function doctor_patient()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $doctor = Doctor::where('user_id',$user_id)->get();
        // dd($doctor);
        $doctor_id = $doctor[0]->id;
        $patients = Patient::where('doctor_id',$doctor_id)->orderBy('created_at','desc')->get();

        return view('backend.doctor_patient',compact('patients'));
    }

    public function doctor_schedule()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $udoctor = Doctor::where('user_id',$user_id)->get();
        //dd($doctor);
        $doctor_id = $udoctor[0]->id;
        $schedules = Schedule::where('doctor_id',$doctor_id)->get();

        return view('backend.doctor_schedule',compact('schedules'));
    }

    public function doctor_edit(Request $request)
    {
        // dd($request);
        $validator=$request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'speciality_id' => 'required|numeric|min:0|not_in:0'
        ]);

        if($validator)
        {
            $id = $request->doctor_id;
            $oldProfile = $request->oldProfile;
            $oldPassword = $request->oldPassword;
            $newProfile = $request->newProfile;
             if($request->hasFile('newProfile')){
                //file upload
                $imageName=time().'.'.$newProfile->extension();

                $newProfile->move(public_path('images/doctor'),$imageName);

                $filepath='images/doctor/'.$imageName;

                if(\File::exists(public_path($oldProfile))){
                    \File::delete(public_path($oldProfile));
                }


            }else{
                $filepath=$oldProfile;
            }

            // dd($filepath);
            $name=$request->name;
            $language=$request->language;
            $qualification=$request->qualification;
            $phone=$request->phone;
            $email=$request->email;
            $cost=$request->cost;
            $speciality_id=$request->speciality_id;
            //$extension = \File::extension($profile);
            // dd($foo = \File::extension($profile));
            // dd($request->newPassword);
            $newPassword = $request->newPassword;
            if ($newPassword) {
                // dd($newPassword);
                $password = Hash::make($newPassword);
            }else {
                $password = $oldPassword;
                // dd($password);
            }
            // dd(Hash::make($password));
            //Data insert
            $user = Auth::user();
            $user_id = $user->id;
            $user = User::find($user_id);
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

            
            

            
            if ($newPassword) {
                Auth::logout();
                return redirect()->route('login');
            }else {
                return redirect()->back()->with('successMsg','Your Profile has been UPDATED!!!!');
            }
        }else{
            return redirect::back()->withErrors($validator);
        }
    }

}
