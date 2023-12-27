<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Mail\AppointmentMail;
use App\Models\Prescription;

class FrontendController extends Controller
{
    //
    public function index(){
        date_default_timezone_set('Asia/Bangkok');
        $doctors = Appointment::where('date',date('Y-m-d'))->get();
        //return $doctor;

        if(request('date')){
            $doctors = $this->findDoctorsBasedOnDates(request('date'));
            return view('welcome',compact('doctors'));
            //dd($this->findDoctorsBasedOnDates(request('date')));
        }
        return view('welcome',compact('doctors'));
    }

    public function show($doctorId,$date){

        $appointment = Appointment::where('user_id',$doctorId)->where('date',$date)->first();
        $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
        //print $times;
        $user = User::where('id',$doctorId)->first();
        $doctor_id =$doctorId;
        return view('booking',compact('times','date','user','doctor_id'));
    }

    public function findDoctorsBasedOnDates($date){
        $doctors = Appointment::where('date',$date)->get();
        return $doctors;

    }

    public function store(Request $request){
        date_default_timezone_set('Asia/Bangkok');

        $request->validate(['time'=>'required']);

        $check = $this->checkBookingTimeInterval();

        //dd($request->doctor_id);
        //dd($request->appointment_id);
        //dd($request->time);
        if($check){
            return redirect()->back()->with('errmessage','You already have an appointment. Please wait to make another appointment ');
        }
        Booking::create([
            'user_id'=>auth()->user()->id,
            'doctor_id'=>$request->doctor_id,
            'time'=>$request->time,
            'date'=>$request->date,
            'status'=>0,
        ]);

        Time::where('appointment_id',$request->appointment_id)->where('time',$request->time)->update(['status'=>1]);


        /* Email */
        $doctorName = User::where('id',$request->doctor_id)->first();
        $mailData=[
            'name'=>auth()->user()->name,
            'time'=>$request->time,
            'date'=>$request->date,
            'doctorName' => $doctorName->name
        ];
        try{
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
        }
        catch(\Exception $e){

        }
        return redirect()->back()->with('message','Your appointment was booked successfully');
    }

    public function checkBookingTimeInterval(){

        return Booking::orderby('id','desc')->where('user_id',auth()->user()->id)->whereDate('created_at',date('Y-m-d'))->exists();
    }

    public function myBooking(){
        $appointments =Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('booking.index',compact('appointments'));
    }
    public function myPrescription(){
        $prescriptions =Prescription::where('user_id',auth()->user()->id)->get();
        return view('my-prescription',compact('prescriptions'));
    }


}
