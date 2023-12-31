<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(\Auth::user()->role->name);
        $users = User::where('role_id','!=',2)->get();
        return view('admins.doctor.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      /*   $input = $request->all();
        dd($input); */
        /* validatoin and store */
        /* $this->validateStore($request);
        $data = $request->all();
        $image = $request->file('image');
        $name =$image->hashName();
        $destination = public_path('/images');
        $image->move($destination,$name);

        $data['image']= $name;
        $data['password']= bcrypt($request->password);

        User::create($data);

        return redirect()->back()->with('message','Doctor added sucessfully'); */
$this->validateStore($request);
        $data = $request->all();
        $image = $request->file('image');
        $name =$image->hashName();
        $destination = public_path('/images');
        $image->move($destination,$name);
        $data['image']= $name;
        $data['password']= bcrypt($request->password);

        User::create($data);
        return redirect()->back()->with('message','Doctor added sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //dd($id);
        $user =user::find($id);
        return view('admins.doctor.delete',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admins.doctor.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validateUpdate($request, $id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName =$image->hashName();
            $destination = public_path('/images');
            $image->move($destination,$imageName);
        }
        $data['image'] = $imageName;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        else{
            $data['password'] = $userPassword;
        }

        $user->update($data);

        return redirect()->route('doctor.index')->with('message','Doctor Information Updated ');

    }
    public function validateStore(Request $request){

            return    $this->validate($request,[
            'name'=>'required',
            'email' => 'required|unique:users',
            'password'=>'required|min:6|max:25',
            'gender'=> 'required',
            'degree'=> 'required',
            'address'=> 'required',
            'department'=> 'required',
            'phone_number'=> 'required',
            'image'=> 'required|mimes:jpeg,jpg,png',
            'role_id'=> 'required',
            'description'=> 'required',
    ]);
    }

    public function validateUpdate(Request $request,$id){

        return    $this->validate($request,[
        'name'=>'required',
        'email' => 'required|unique:users,email,'.$id,
        'gender'=> 'required',
        'degree'=> 'required',
        'address'=> 'required',
        'department'=> 'required',
        'phone_number'=> 'required',
        'image'=> 'mimes:jpeg,jpg,png',
        'role_id'=> 'required',
        'description'=> 'required',
]);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(auth()->user()->id == $id){
            abort(401);
        }
        $user = User::find($id);
        $userDelete = $user->delete();
        if($userDelete){
            unlink(public_path('images/'.$user->image));
        }

        return redirect()->route('doctor.index')->with('message','Doctor deleted sucessfully ');

        /* dd($id); */
    }
}
