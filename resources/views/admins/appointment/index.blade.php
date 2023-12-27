@extends('admins.layouts.master')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>Doctors</h5>
                            <span>Appointment Time Slot</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="contianer">
            @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
                {{Session::get('message')}}
            </div>
        @endif

        @if(Session::has('errmessage'))
            <div class="alert bg-danger alert-success text-white">
                {{Session::get('errmessage')}}
            </div>
        @endif

        @foreach ($errors->all() as $error )
                <div class="alert alert-danger">
                    {{$error}}
                </div>
        @endforeach
            <form action="{{route('appointment.check')}}" method="POST">@csrf


            <div class="card">
                <div class="card-header">
                    Chose Date

                    @if (isset($date))

                    <br>Your Time Table For: {{$date}}

                    @endif
                </div>
                <div class="card-body">
                    <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
                    <br>
                    <button class="btn btn-primary">Check</button>
                </div>

            </div>

            </form>

            @if (Route::is('appointment.check'))

            <form action="{{route('update')}}" method="post"> @csrf
            <div class="row">
                <input type="hidden" name="appontmentId" value="{{$appointmentId}}">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            Morning Shift
                            <span style="margin-left: 55%">Check/Uncheck <input type="checkbox"
                                onclick="for(c in document.getElementsByName('time[]'))
                                document.getElementsByName('time[]').item(c).checked=this.checked"></span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">

                                <tbody>
                                    <tr>

                                        <td><input type="checkbox" name="time[]"  value="4am"
                                            @if(isset($times)){{$times->contains('time','4am')?'checked':'' }}
                                            @endif>
                                            4:00am
                                        </td>

                                        <td><input type="checkbox" name="time[]"  value="4.35am"@if(isset($times)){{$times->contains('time','4.35am')?'checked':'' }}
                                            @endif>4:35am</td>
                                      </tr>
                                    <tr>

                                        <td><input type="checkbox" name="time[]"  value="5am" @if(isset($times)){{$times->contains('time','5am')?'checked':'' }}
                                            @endif>5:00am</td>

                                        <td><input type="checkbox" name="time[]"  value="5.35am" @if(isset($times)){{$times->contains('time','5.35am')?'checked':'' }}
                                            @endif>5:35am</td>
                                      </tr>
                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="6am"@if(isset($times)){{$times->contains('time','6am')?'checked':'' }}
                                        @endif>6:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="6.35am" @if(isset($times)){{$times->contains('time','6.35am')?'checked':'' }}
                                        @endif>6:35am</td>
                                  </tr>

                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="7am" @if(isset($times)){{$times->contains('time','7am')?'checked':'' }}
                                        @endif>7:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="7.35am" @if(isset($times)){{$times->contains('time','7.35am')?'checked':'' }}
                                        @endif>7:35am</td>
                                  </tr>

                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="8am" @if(isset($times)){{$times->contains('time','8am')?'checked':'' }}
                                        @endif>8:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="8.35am" @if(isset($times)){{$times->contains('time','8.35am')?'checked':'' }}
                                        @endif>8:35am</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="9am" @if(isset($times)){{$times->contains('time','9am')?'checked':'' }}
                                        @endif>9:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="9.35am" @if(isset($times)){{$times->contains('time','9.35am')?'checked':'' }}
                                        @endif>9:35am</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="10am" @if(isset($times)){{$times->contains('time','10am')?'checked':'' }}
                                        @endif>10:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="10.35am" @if(isset($times)){{$times->contains('time','10.35am')?'checked':'' }}
                                        @endif>10:35am</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="11am" @if(isset($times)){{$times->contains('time','11am')?'checked':'' }}
                                        @endif>11:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="11.35am" @if(isset($times)){{$times->contains('time','11.35am')?'checked':'' }}
                                        @endif>11:35am</td>
                                  </tr>

                                </tbody>
                              </table>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header">
                            Day Shift
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">

                                <tbody>
                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="1pm" @if(isset($times)){{$times->contains('time','1pm')?'checked':'' }}
                                        @endif>1:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="1.35pm" @if(isset($times)){{$times->contains('time','1.35pm')?'checked':'' }}
                                        @endif>1:35pm</td>
                                  </tr>
                                  </tr>

                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="2pm" @if(isset($times)){{$times->contains('time','2pm')?'checked':'' }}
                                        @endif>2:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="2.35pm" @if(isset($times)){{$times->contains('time','2.35pm')?'checked':'' }}
                                        @endif>2:35pm</td>
                                  </tr>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="3pm" @if(isset($times)){{$times->contains('time','3pm')?'checked':'' }}
                                        @endif>3:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="3.35pm" @if(isset($times)){{$times->contains('time','3.35pm')?'checked':'' }}
                                        @endif>3:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="4pm" @if(isset($times)){{$times->contains('time','4pm')?'checked':'' }}
                                        @endif>4:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="4.35pm" @if(isset($times)){{$times->contains('time','4.35pm')?'checked':'' }}
                                        @endif>4:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="5pm" @if(isset($times)){{$times->contains('time','5pm')?'checked':'' }}
                                        @endif>5:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="5.35pm" @if(isset($times)){{$times->contains('time','5.35pm')?'checked':'' }}
                                        @endif>5:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="6pm" @if(isset($times)){{$times->contains('time','6pm')?'checked':'' }}
                                        @endif>6:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="6.35pm" @if(isset($times)){{$times->contains('time','6.35pm')?'checked':'' }}
                                        @endif>6:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="7pm" @if(isset($times)){{$times->contains('time','7pm')?'checked':'' }}
                                        @endif>7:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="7.35pm" @if(isset($times)){{$times->contains('time','7.35pm')?'checked':'' }}
                                        @endif>7:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="8pm" @if(isset($times)){{$times->contains('time','8pm')?'checked':'' }}
                                        @endif>8:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="8.35pm" @if(isset($times)){{$times->contains('time','8.35pm')?'checked':'' }}
                                        @endif>8:35pm</td>
                                  </tr>



                                </tbody>
                              </table>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
            @else
            <h4>
                Your Appointment time List: {{$myappointments->count()}}
            </h4>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Date</th>
                    <th scope="col">View/Update</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($myappointments as $appointment )
                  <tr>
                    <th scope="row">1</th>
                    <td>{{$appointment->doctor->name}}</td>
                    <td>{{$appointment->date}}</td>
                    <td>
                        <form action="{{route('appointment.check')}}" method="POST">@csrf
                            <input type="hidden" name="date" value="{{$appointment->date}}">
                            <button class="btn btn-success">View/Update</button>
                        </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
        </div>

    </div>
</div>

<style>
   input[type="checkbox"]{
    zoom:1;
   }
   body{
    font-size: 16px;
   }
</style>
@endsection
