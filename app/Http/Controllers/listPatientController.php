<?php

namespace App\Http\Controllers;
use App\Models\Booking;

use Illuminate\Http\Request;

class listPatientController extends Controller
{
    //
    public function index(Request $request){

        date_default_timezone_set('Asia/Bangkok');

        if($request->date){
            $bookings =Booking::latest()->where('date',$request->date)->get();
            return view('admins.patientlist.index',compact('bookings'));
        }

        $bookings =Booking::latest()->where('date',date('Y-m-d'))->get();
        return view('admins.patientlist.index',compact('bookings'));
    }


    /* function to change the staus of appointments */
    public function changeStatus($id){
        $booking =Booking::find($id);
        $booking->status =! $booking->status;
        $booking->save();
        return redirect()->back();


    }
    /* function to get all patients from the datbase */
    public function allAppointments(){
        $bookings =Booking::latest()->paginate(5);
        return view('admins.patientlist.all',compact('bookings'));
    }
}
