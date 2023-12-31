@extends('admins.layouts.master')

@section('content')
<div class="main-content">
    <div class="container-fluid">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>{{$prescription->user->name}}</h4>
                </div>

                <div class="card-body">
                    <p>Date:            {{$prescription->date}}</p>
                    <p>Prescribed by:   {{$prescription->doctor->name}}</p>
                    <p>Disease:         {{$prescription->name_of_disease}}</p>
                    <p>Symptoms:        {{$prescription->symptoms}}</p>
                    <p>Medicine:        {{$prescription->medicine}}</p>
                    <p>Procedure:       {{$prescription->process_to_use_medicine}}</p>
                    <p>Feedback:        {{$prescription->feedback}}</p>
                    <p>Signature:       {{$prescription->signature}}</p>
                </div>
            </div>
        </div>
    </div>

</div>


    </div>
</div>




@endsection


