@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-info">Hello {{auth()->user()->name}} {{Session::get('message')}}</div>
        @endif
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">

                        <p>Name: {{auth()->user()->name}}</p>
                        <p>Email: {{auth()->user()->email}}</p>
                        <p>Address: {{auth()->user()->address}}</p>
                        <p>Phone Number: {{auth()->user()->phone_number}}</p>
                        <p>Gender: {{auth()->user()->gender}}</p>
                        <p>Bio: {{auth()->user()->description}}</p>


                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Update Profile
                </div>
                <div class="card-body">
                    <form action="{{route('userprofile.update')}}" method="POST">@csrf

                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control" value="{{auth()->user()->address}}">
                        </div>
                        <div class="form-group">
                            <label>Phone Number:</label>
                            <input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="male" @if(auth()->user()->gender === 'male') selected @endif>Male</option>
                                    <option value="female" @if(auth()->user()->gender === 'female') selected @endif>Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea type="text" name="description" class="form-control" value="{{auth()->user()->description}}"> </textarea>
                        </div>


                        <div class="form-group">


                        <button class="btn btn-info" type="submit">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Image</div>
                <form action="{{route('profile.pic')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="card-body">

                        @if(!auth()->user()->image)
                            <img src="/doct/3.jpg" style="width:50%">
                        @else
                            <img src="/profile/{{auth()->user()->image}}" style="width:50%">
                        @endif

                        <hr>

                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" required="">

                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                        <button class="btn btn-primary" type="submit">Update Image</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
