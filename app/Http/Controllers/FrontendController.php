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

class FrontendController extends Controller
{
    //
    public function index()
    {
        //
        $doctors = Doctor::all();
        $doctor_carousel = DB::table('doctors')
        					->join('schedules','doctors.id','=','schedules.doctor_id')
        					->join('users','users.id','=','doctors.user_id')
        					->select('doctors.*', 'users.name as name', 'users.email as email', 'schedules.day as day', 'schedules.time as time')
        					->get();
        // dd($doctor_carousel);
        return view('frontend.index',compact('doctors','doctor_carousel'));
    }

    public function speciality_page($id)
    {
    	// dd($id);
    	// $speciality = Speciality::find($id);
    	$doctors = Doctor::where('speciality_id',$id)->get();

        $schedules = Schedule::all();
    	return view('frontend.speciality_page',compact('doctors','schedules'));
    }

    public function patient_info(Request $request)
    {
    	// dd($request);
        $validator=$request->validate([
            'name' => ['required','string','max:255'],
            'doctor_id' => 'required|numeric|min:0|not_in:0',
            'schedule_id' => 'required|numeric|min:0|not_in:0'
        ]);

        if($validator)
        {
            $appoinment_Date = Carbon::now();
            $name=$request->name;
            $address=$request->address;
            $age=$request->age;
            $phone=$request->phone;
            $gender=$request->gender;
            $doctor_id=$request->doctor_id;
            $schedule_id=$request->schedule_id;


            $user = Auth::user();
            $user_id = $user->id;

            //Data insert
            $patient = new Patient;
            $patient->name = $name;
            $patient->age = $age;
            $patient->gender = $gender;
            $patient->phone = $phone;
            $patient->address = $address;
            $patient->doctor_id = $doctor_id;
            $patient->user_id = $user_id;
            
            $patient->save();

            $patient->schedules()->attach($schedule_id,['appoinment_Date'=>$appoinment_Date]);

            
            

            return redirect()->route('appoinment_success');
        }else{
            return redirect::back()->withErrors($validator);
        }
        
    }

    public function appoinment_success()
    {
        return view('frontend.appoinment_success');
    }

    public function appoinment_doctor($id)
    {
    	// dd($id);
    	$doctor = Doctor::find($id);
    	$schedules = Schedule::where('doctor_id',$id)->get();
    	return view('frontend.appoinment_doctor',compact('doctor','schedules'));
    }

    public function user_profile()
    {
        $user = Auth::user();
        // dd($user);
        $user_id = $user->id;
        // dd($user_id);
        $appoinments = DB::table('appoinments')
                         ->join('patients','patients.id','appoinments.patient_id')
                         ->join('doctors','doctors.id','patients.doctor_id')
                         ->join('users','users.id','doctors.user_id')
                         ->join('schedules','schedules.id','appoinments.schedule_id')
                         ->select('appoinments.*', 'patients.name as p_name', 'patients.phone as p_phone', 'schedules.day as day', 'schedules.time as time', 'users.name as doctor_name', 'doctors.phone as doctor_phone')
                         ->where('patients.user_id',$user_id)
                         ->get();
        // dd($appoinments);

        return view('frontend.user_profile',compact('appoinments','user'));

    }

    public function user_edit(Request $request)
    {
        // dd($request);
        $validator=$request->validate([
            'email' => ['required', 'string', 'email', 'max:255']
        ]);
        if($validator)
        {
            $id = $request->user_id;
            $oldPassword = $request->oldPassword;
            

            // dd($filepath);
            $name=$request->name;
            $email=$request->email;

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
            $user = User::find($id);
            $user->name=$name;
            $user->email=$email;
            $user->password=$password;
            $user->save();

            
            

            
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
