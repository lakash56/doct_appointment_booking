<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\listPatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Models\Appointment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[FrontendController::class,'index']);
Route::get('/new-appointment/{doctorId}/{date}',[FrontendController::class,'show'])->name('create.appointment');
Route::get('/requirement', function () {return view('requirements');});
Route::get('/dashboard',[DashboardController::class,'index']);


Route::group(['middleware'=>['auth','patient']],function(){

Route::post('/book/appointment',[FrontendController::class,'store'])->name('book.appointment');
Route::get('/mybooking',[FrontendController::class,'myBooking'])->name('my.booking');
//Route::post('/profile',[ProfileController::class,'store'])->name('profile.update');
Route::post('/update-profile',[ProfileController::class,'updateUser'])->name('userprofile.update');
Route::get('/user-profile',[ProfileController::class,'index']);
Route::post('/profile-pic',[ProfileController::class,'profilePic'])->name('profile.pic');
Route::get('/my-prescription',[FrontendController::class,'myPrescription'])->name('my.Prescription');

});


/* Route::get('/dashboard', function () {
    return view('dashboard');
}); */

/* Route::get('/test', function () {
    return view('test');
}); */

/* middleware */
Route::group(['middleware'=>['auth','admin']],function(){
    Route::resource('doctor','DoctorController');
    Route::get('/patientlist',[listPatientController::class,'index'])->name('patientlist');
    Route::get('/patientlist/all',[listPatientController::class,'allAppointments'])->name('appointment.all');
    Route::get('/status/update/{id}',[listPatientController::class,'changeStatus'])->name('update.status');
    Route::resource('department','DepartmentController');
});

Route::group(['middleware'=>['auth','doctor']],function(){
    Route::resource('appointment','AppointmentController');
    Route::post('/appointment/check',[AppointmentController::class,'check'])->name('appointment.check');
    Route::post('/appointment/update',[AppointmentController::class,'updatetime'])->name('update');
    /* prescription */
    Route::get('patient-today',[PrescriptionController::class,'index'])->name('patients.today');
    Route::post('/prescription',[PrescriptionController::class,'store'])->name('prescription');
    /* Route::GET('/prescription/{userId}/{date}',[PrescriptionController::class,'show'])->name('prescription.show'); */
    Route::get('/prescription/{user_id}/{date}',[PrescriptionController::class,'showPrescription'])->name('view.prescription');
    Route::get('/prescribed-patients',[PrescriptionController::class,'patientsPrescriptionFrom'])->name('prescribes.patients');
});



Auth::routes([
    'verify' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
