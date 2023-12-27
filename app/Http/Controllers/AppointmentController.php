<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $myappointments = Appointment::latest()->where('user_id',auth()->user()->id)->get();
        return view('admins.appointment.index',compact('myappointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.appointment.create');
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

       /*  $this->validate($request,[
            'date' => 'required|unique:appointments,date,NULL,id,user_id'.\Auth::id(),
            'time' => 'required'
        ]);
    */  $this->validate($request,[
            'date' => 'required|unique:appointments,date,NULL,id,user_id,'.\Auth::id(),
            'time' => 'required'
        ]);
       // dd($request->all());
        $appointment = Appointment::create([
            'user_id'=>auth()->user()->id,
            'date' => $request->date
        ]);
        foreach($request->time as $time){
            Time::create([
                'appointment_id'=>$appointment->id,
                'time'=> $time,
                //'status'=>0 already given in migration file
            ]);
        };

        return redirect()->back()->with('message','Appoinment Time slot created for ' .$request->date);
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

    public function check(Request $request){
        //return ('ok');
        $date = $request->date;
        $appointment= Appointment::where('date', $date)->where('user_id',auth()->user()->id)->first();
        if(!$appointment){
            return redirect()->to('/appointment')->with('errmessage','Appointment time not available for this date');
        }
        $appointmentId= $appointment->id;
        $times = Time::where('appointment_id',$appointmentId)->get();
        //return $times;
        return view('admins.appointment.index',compact('times','appointmentId','date'));
    }
    public function updatetime(Request $request){
        //return('ok');
        $appointmentId =$request->appontmentId;
        $appointment = Time::where('appointment_id',$appointmentId)->delete();

        foreach($request->time as $time){
            Time::create([
                'appointment_id'=> $appointmentId,
                'time' => $time,
                'status'=>0 // will be changed
            ]);
        }

        return redirect()->route('appointment.index')->with('message','Appointment time updated');
    }
}
