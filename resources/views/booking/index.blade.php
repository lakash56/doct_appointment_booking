@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your Appointments:  ({{$appointments->count()}})</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Time</th>
                            <th scope="col">Date of Visit</th>
                            <th scope="col">Date of Booking</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $key=>$appointment)

                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>Dr.{{$appointment->doctor->name}}</td>
                            <td>{{$appointment->time}}</td>
                            <td>{{$appointment->date}}</td>
                            <td>{{$appointment->created_at}}</td>
                            <td>
                                @if($appointment->status==0)
                                    <button class="btn btn-sm btn-info">Not Visited</button>
                                @else
                                <button class="btn btn-sm btn-success">Checked</button>
                                @endif
                            </td>
                          </tr>

                          @empty
                          <td>You have not booked any appointments</td>
                          @endforelse

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


