@extends('admins.layouts.master')

@section('content')
<div class="main-content">
    <div class="container-fluid">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::has('message'))
                <div class=" alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
                <div class="card-header">Appointments:  ({{$bookings->count()}})</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th>Avatar</th>
                            <th scope="col">Date</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Time</th>
                            <th scope="col">Phone</th>
                            <th scope="col">With Doctor</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($bookings as $key=>$booking)

                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td><img src="/profile/{{$booking->user->image}}" style="width:50px; border-radius:50%"></td>
                            <td>{{$booking->date}}</td>
                            <td>{{$booking->user->name}}</td>
                            <td>{{$booking->user->email}}</td>
                            <td>{{$booking->user->gender}}</td>
                            <td>{{$booking->time}}</td>
                            <td>{{$booking->user->phone_number}}</td>
                            <td>{{$booking->doctor->name}}</td>
                            <td>
                                @if($booking->status==1)
                                <button class="btn btn-sm btn-success">Checked</button>
                                @if (!App\Models\Prescription::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())


                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user->id}}">
                                    Prescription
                                  </button>
                                  @include('prescription.form')
                                  @else
                                    <a href="{{route('view.prescription',[$booking->user_id,$booking->date])}}" class="btn btn-info">View Prescription</a>
                                  @endif
                                @endif
                            </td>
                          </tr>
                          @empty
                          <td>Appointment Not available</td>
                          @endforelse

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>
</div>




@endsection


