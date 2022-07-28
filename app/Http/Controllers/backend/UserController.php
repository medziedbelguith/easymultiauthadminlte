<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function AllUser()
    {   $all=DB::table('users')->get();
        return view('backend.user.all-user',compact('all'));

    }

    public function AddUser()
    {
        return view('backend.user.add-user');

    }
    
    public function store(Request $request)
    {   $user=new User;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->role=$request->input('role');
        $user->save();

        return redirect()->route('alluser')
            ->with('success', 'User created successfully.');
    }
        public function edit($id)
        {
            $user = User::findOrFail($id);

            return view('backend.user.edit-user', compact('user'));
        }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        User::whereId($id)->update($validatedData);
        return redirect()->route('alluser')
        ->with('success', 'User updated successfully.');
    }
    public function destroy($id)
    {
        //
        $user =  User::find($id);
        $user->delete();
        return redirect()->route('alluser')
        ->with('success', 'User deleted successfully.');
    }

}
