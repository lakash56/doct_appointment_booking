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
                            <span>Remove</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Deletee</li>
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
                    <div class="card-headerr"><h3>Confirm Delete</h3></div>
                    <div class="card-body">


                       {{-- section form--}}
                       {{-- give acton to the form to route doctor.store --}}
                       {{-- from image multipart/fomr-data in enctype --}}

                       <h2>{{$user->name}}</h2>
                       <p>Are you sure you want to delete this user? All The informatio will be deleted.</p>
                        <form class="form-sample" action="{{route('doctor.destroy',[$user->id])}}" method="post" enctype="multipart/form-data">@csrf
                          @method('DELETE')

                                <button type="submit" class="btn btn-danger mr-2">Confirm</button>
                                <a href="{{route('doctor.index')}}" class="btn btn-primary">Cancel</a>


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
