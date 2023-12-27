<?php

namespace App\Http\Controllers;
use App\Models\Prescription;
use App\Models\Booking;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    //
    public function index(){

        date_default_timezone_set('Asia/Bangkok');
        $bookings = Booking::where('date',date('Y-m-d'))->where('status',1)->where('doctor_id',auth()->user()->id)->get();
        return view('prescription.index',compact('bookings'));

    }

    public function store(Request $request){
        $data = $request->all();
        //dd($data);
        $data['medicine']=implode(',',$request->medicine);
        Prescription::create($data);


        return redirect()->back()->with('message','Prescription created');
    }

    /* public function show($userId,$date){
        return view(('prescription.show'));
    } */

    public function showPrescription($userId,$date){

        $prescription = Prescription::where('user_id',$userId)->where('date',$date)->first();

          /* Email */
          $emaildata =[
            'name'=>$prescription->user->name,

        ];
        return view('prescription.show',compact('prescription'));
    }

    /* get all patinets from prescription table */
    public function patientsPrescriptionFrom(){
        $patients = Prescription::get();
        return view('prescription.all',compact('patients'));
    }
}
