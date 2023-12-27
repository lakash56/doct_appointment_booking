@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">

                        <h4>Doctor Information</h4>
                        <img src="{{asset('images')}}/{{$user->image}}" style="border-radius:50%; width:100px">
                        <hr>
                        <p class="lead">Name: {{ucfirst($user->name)}}</p>
                        <p class="lead">Degree: {{$user->degree}}</p>
                        <p class="lead">Expertise: {{$user->department}}</p>

                </div>
            </div>
        </div>
        <div class="col-md-9">
            @foreach ($errors->all() as $error )
                <div class="alert alert-danger">{{$error}}</div>

            @endforeach
            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            @if(Session::has('errmessage'))
                <div class="alert alert-info">
                    {{Session::get('errmessage')}}
                </div>
            @endif
            @if(Session::has('loginmessage'))
            <div class="alert alert-warning">
                {{Session::get('loginmessage')}}
            </div>
            @endif
            <form action="{{route('book.appointment')}}" method="post">@csrf
            <div class="card">
                <div class="card-header lead">{{$date}}</div>

                <div class="card-body">
                    <div class="row">
                    @foreach ($times as $time )
                        <div class="col-md-3 mt-1">
                            <label class="btn btn-outline-info">
                                <input type="radio" name="time" value="{{$time->time}}">
                                <span id="text">{{$time->time}}</span>
                            </label>
                        </div>
                                <input type="hidden" name="doctor_id" value="{{$doctor_id}}">
                                <input type="hidden" name="appointment_id" value="{{$time->appointment_id}}">
                                <input type="hidden" name="date" value="{{$date}}">

                               {{--  {{$time->appointment_id}} --}}

                        @endforeach
                    </div>
                </div>
                @if(Auth::check())
                <div class="card-footer">
                    <button class="btn btn-info" type="submit" style="width: 100%">Book Appointment</button>
                </div>
                @else
                <div class="text-center">
                    <hr>
                    <p>Please <a href="/register" class="btn btn-info btn-sm" >Register</a> or <a href="/login" class="btn btn-success btn-sm">Login</a> to make an appointment.</p>
                </div>
                @endif
            </div>

            </form>
        </div>
    </div>
</div>


@endsection
