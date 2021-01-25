<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUser;
use App\Http\Requests\User\UpdateUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dashboard.user')->with('users',User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $createUser)
    {
        $createUser = $createUser->all();
        try {
            $user =  User::Create([
                'name' => $createUser['name'],
                'email' => $createUser['email'],
                'password' => Hash::make($createUser['password']),
                'role_id'=> $createUser['role_id'],
                'disabled' => $createUser['disabled'] 
            ]);
             session()->flash('success','User inserted successful');
          return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
             session()->flash('error','Error inserting user');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $updateUser,User $user)
    {
        
       $updateUser = $updateUser->all();

      // dd($updateUser);
               try {
             $user->update([
                'name' => $updateUser['name'],
                'email' => $updateUser['email'],
                'password' => Hash::make($updateUser['password']),
                'role_id'=> $updateUser['role_id'],
                'disabled' => $updateUser['disabled'] 
             ]);
            session()->flash('success','User Updated successful');
          return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
             session()->flash('error','Error Updating user');
          return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            session()->flash('success','User deleted successful');
          return redirect()->back();
        } catch (\Throwable $th) {
              session()->flash('error','Error deleting user');
            return redirect()->back();
        }
    }
}