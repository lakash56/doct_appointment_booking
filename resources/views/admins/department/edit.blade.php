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
                            <h5>Departments</h5>
                            <span>Update Department</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Department</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
{{-- Add doctor form --}}
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-headerr"><h3>Update Department</h3></div>
                    <div class="card-body">


                       {{-- section form--}}
                       {{-- give acton to the form to route doctor.store --}}
                       {{-- from image multipart/fomr-data in enctype --}}
                        <form class="form-sample" action="{{route('department.update',[$department->id])}}" method="post">@csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-6">
                                    <label for ="">Department Name</label>
                                    <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" placeholder="Deparment" value="{{$department->department}}">

                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button  class="btn btn-danger">Cancel</button>
                            </div>


                        </form>


                        {{-- section from end--}}
                    </div>
                </div>
            </div>
        </div>
{{-- Add  doctor form close --}}
    </div>
</div>
@endsection
