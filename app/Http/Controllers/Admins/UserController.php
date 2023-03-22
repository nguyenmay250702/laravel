<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = User::all();
        return view("admins/users/index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admins/users/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|email',
            'pass'      =>  'required',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->pass);

        $user->save();

        return redirect()->route('users.index')->with('success', 'User Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("admins/users/show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("admins/users/edit",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_name'          =>  'required',
            'user_email'         =>  'required|email',
        ]);

        //nếu người dung nhập pass mới thì cập nhật lại pass vừa nhập
        if($request->pass_new != ""){
            $user->password = bcrypt($request->pass_new);
        }

        $user->name = $request->user_name;
        $user->email = $request->user_email;

        $user->save();

        return redirect()->route('users.index')->with('success', 'User Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Data has been delete successfully');
    }
}
