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
                            <span>Add Doctors</span>
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
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                    <div class="card-headerr"><h3>Add Doctor</h3></div>
                    <div class="card-body">


                       {{-- section form--}}
                       {{-- give acton to the form to route doctor.store --}}
                       {{-- from image multipart/fomr-data in enctype --}}
                        <form class="form-sample" action="{{route('doctor.store')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row">
                                {{-- Name --}}
                                <div class="col-md-6">
                                    <label for ="">Full Name</label>
                                    {{-- helper {{old'name'}} for storing the old value into the form --}}
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Doctor Name" value="{{old('name')}}">
                                    {{-- error validation --}}
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>
                                {{-- Name close --}}
                                <div class="col-md-6">
                                    <label for ="">Email</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  value="{{old('email')}}">
                                    {{-- error validation --}}
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for ="">Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
                                    {{-- error validation --}}
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>
                                <div class="col-md-6">
                                    <label for ="">Gender</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                        <option value="" class="disable">
                                            Select your gender
                                        </option>
                                        <option value="male">
                                            Male
                                        </option>
                                        <option value="female">
                                            Female
                                        </option>
                                    </select>
                                    {{-- error validation  @error('gender') is-invalid @enderror --}}
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for ="">Degree </label>
                                    <input type="text" name="degree" class="form-control @error('degree') is-invalid @enderror" placeholder="Degree"  value="{{old('degree')}}">
                                    {{-- error validation --}}
                                    @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>
                                <div class="col-md-6">
                                    <label for ="">Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address"  value="{{old('address')}}">
                                    {{-- error validation --}}
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for ="">Specialist </label>
                                    {{-- <input type="text" name="department" class="form-control @error('department') is-invalid @enderror" placeholder="Department"  value="{{old('department')}}">
                                     --}}{{-- error validation --}}
                                     <select name="department" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach (App\Models\Department::all() as $depart )
                                        <option value="{{$depart->department}}">
                                            {{$depart->department}}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    {{-- error validation end --}}
                                </div>
                                <div class="col-md-6">
                                    <label for ="">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number"  value="{{old('phone_numberffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff')}}">
                                    {{-- error validation --}}
                                    @error('phone_numnber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>
                            </div>

                            <div class="row">
                                {{-- <div class="col-md-6"> --}}
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>

                                        <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror" placeholder="Upload Image" name="image">
                                        {{-- error validation --}}
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    {{-- error validation end --}}
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Select Photo</button>
                                        </span>
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <label>Role</label>
                                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                            <option value="">Please Select Role</option>
                                                @foreach (\App\Models\Role::where('name','!=','patient')->get() as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach

                                        </select>
                                        {{-- error validation --}}
                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                    </div>

                                {{-- </div> --}}
                            </div>

                                <div class="form-group">
                                    <label for="exampleTextarea1">About Doctor</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4" name="description">
                                        {{old('description')}}
                                    </textarea>
                                    {{-- error validation --}}
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- error validation end --}}
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                


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
