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
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        @foreach ($errors->all() as $error )
                <div class="alert alert-danger">
                    {{$error}}
                </div>
        @endforeach
            <form action="{{route('appointment.store')}}" method="POST">@csrf


            <div class="card">
                <div class="card-header">
                    Chose Date
                </div>
                <div class="card-body">
                    <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Morning Shift
                            <span style="margin-left: 70%">Check/Uncheck <input type="checkbox"
                                onclick="for(c in document.getElementsByName('time[]'))
                                document.getElementsByName('time[]').item(c).checked=this.checked"></span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">

                                <tbody>
                                    <tr>

                                        <td><input type="checkbox" name="time[]"  value="4am">4:00am</td>

                                        <td><input type="checkbox" name="time[]"  value="4.35am">4:35am</td>
                                      </tr>
                                    <tr>

                                        <td><input type="checkbox" name="time[]"  value="5am">5:00am</td>

                                        <td><input type="checkbox" name="time[]"  value="5.35am">5:35am</td>
                                      </tr>
                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="6am">6:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="6.35am">6:35am</td>
                                  </tr>

                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="7am">7:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="7.35am">7:35am</td>
                                  </tr>

                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="8am">8:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="8.35am">8:35am</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="9am">9:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="9.35am">9:35am</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="10am">10:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="10.35am">10:35am</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="11am">11:00am</td>

                                    <td><input type="checkbox" name="time[]"  value="11.35am">11:35am</td>
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

                                    <td><input type="checkbox" name="time[]"  value="1pm">1:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="1.35am">1:35pm</td>
                                  </tr>
                                  </tr>

                                  <tr>

                                    <td><input type="checkbox" name="time[]"  value="2pm">2:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="2.35pm">2:35pm</td>
                                  </tr>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="3pm">3:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="3.35pm">3:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="4pm">4:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="4.35pm">4:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="5pm">5:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="5.35pm">5:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="6pm">6:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="6.35pm">6:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="7pm">7:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="7.35pm">7:35pm</td>
                                  </tr>

                                  <tr>
                                    <td><input type="checkbox" name="time[]"  value="8pm">8:00pm</td>

                                    <td><input type="checkbox" name="time[]"  value="8.35pm">8:35pm</td>
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
