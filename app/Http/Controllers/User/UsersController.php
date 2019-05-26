<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers = User::whereHas('roles', function ($query)  {
            $query->where('roles.role', '=', 1);
        })->get();

        $teachers = User::whereHas('roles', function ($query)  {
            $query->where('roles.role', '=', 2);
        })->get();

        $students = User::whereHas('roles', function ($query)  {
            $query->where('roles.role', '=', 3);
        })->get();
        //dd($managers,$teachers,$students);
        return view('admin.users.index',compact('managers','teachers','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'tc' => 'required',
            'roles' => 'required',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->tc = $request->tc;
        $user->save();
        foreach($request->roles as $role)
        {
           $user->roles()->attach(Role::where('role',$role));
        }

        //Return redirect 
        return redirect()
            ->route('user.show', ['user' => $user->id])
            ->with('success', 'تم اضافة مستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view ('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view ('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'tc' => 'required',
            'roles' => 'required',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->tc = $request->tc;
        $user->save();
        foreach($request->roles as $role)
        {
           $user->roles()->attach(Role::where('role',$role));
        }

        //Return redirect 
        return redirect()
            ->route('user.show', ['user' => $user->id])
            ->with('success', 'تم تعديل مستخدم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()
        ->with('success','تم حذف مستخدم بنجاح');
    }
}
