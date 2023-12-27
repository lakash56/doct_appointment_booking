@extends('admins.layouts.master')

@section('content')
<div class="main-content">
    <div class="container-fluid">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Appointments:  ({{$patients->count()}})</div>

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
                            @forelse ($patients as $key=>$patient)

                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td><img src="/profile/{{$patient->user->image}}" style="width:50px; border-radius:50%"></td>
                            <td>{{$patient->date}}</td>
                            <td>{{$patient->user->name}}</td>
                            <td>{{$patient->user->email}}</td>
                            <td>{{$patient->user->gender}}</td>
                            <td>{{$patient->time}}</td>
                            <td>{{$patient->user->phone_number}}</td>
                            <td>{{$patient->doctor->name}}</td>
                            <td>
                                @if($patient->status==1)
                                <button class="btn btn-sm btn-success">Checked</button>
                                @endif

                                    <a href="{{route('view.prescription',[$patient->user_id,$patient->date])}}" class="btn btn-info">View Prescription</a>


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


