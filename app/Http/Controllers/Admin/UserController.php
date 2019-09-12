<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public  function index()
    {
        $users = User::all();
        return view('admin/user/all_users')->with('users',$users);
    }


    /**
     * Show the application users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public  function create()
    {
        return view('admin/user/add_user');
    }

    /**
     *
     * Show the application users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public  function store(Request $request)
    {
        $data = ['name' => $request->name , 'email' => $request->email , 'password' => $request->password , 'password_confirmation' => $request->password_confirmation];
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/user/add')
                ->withErrors($validator)
                ->withInput();
        }

        $data['password'] = Hash::make($data['password']);
        User::create($data);
        Session::flash('message','user created successfully');
        return view('admin/user/add_user');
    }
    /**
     * Show the application users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public  function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('admin/user/edit_user')->with('user', $user);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Show the application users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public  function update(Request $request)
    {
        $data = ['name' => $request->name , 'email' => $request->email , 'password' => $request->password , 'password_confirmation' => $request->password_confirmation];
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/user/edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = User::findOrFail($request->id);
            $data['password'] = Hash::make($data['password']);
            $user->update($data);
            Session::flash('message','user updated successfully');
            return view('admin/user/edit_user')->with('user', $user);
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }
}
