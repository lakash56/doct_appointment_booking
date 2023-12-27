@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row" style="background-image:url('{{asset('banner/banner.jpg')}}');background-size:100% auto; height:500px;">
        <div class="col-md-12">
            <h1 class="display-4" style="margin-top:4%;margin-left:1%">Welcome to Edoct-Appointment Service</h1>
                <p class="lead" style="margin-left:1% ">You can easily register your account for free and book your appointment</p>



                @if (!Auth::check())
                <p style="margin-left:1% ">Please Login or register to make your bookings</p>
                <a class="btn btn-success " href="{{url('/register')}}" role="button" style="margin-left:1% ">Register your account</a>
                <a class="btn btn-info " href="{{url('/login')}}" role="button"style="margin-left:1% ">Login</a>


                @endif


        </div>
    </div>
</div>
<div class="mt-4"></div>
    <div class="container">
        <div class="row">
            <hr>
            <div class="col-md-3">
                <form action="{{url('/')}}" method="GET">@csrf
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">Find Doctors</div>
                        <div class="card-body">
                            <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
                            <br>
                            <button class="btn btn-info">
                                Find Doctor
                             </button>
                        </div>

                    </div>
                </div>
                </form>
            </div>
            {{-- display doct --}}
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">Available Doctors</div>
                        <div class="card-body">
                           <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Book</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($doctors as $doctor)


                                    <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <img src="{{asset('images')}}/{{$doctor->doctor->image}}" alt="" style="border-radius: 50%; z-index:999999; width:50px">
                                    </td>
                                    <td>
                                        {{$doctor->doctor->name}}
                                    </td>
                                    <td>
                                        {{$doctor->doctor->department}}
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('create.appointment',[$doctor->user_id,$doctor->date])}}">Book My Appointment</a>
                                    </td>
                                    </tr>
                                    @empty
                                    <td>Doctors Not available for today</td>
                                    @endforelse
                                </tbody>
                           </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
