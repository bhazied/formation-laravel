<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('paginate.user'));
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        $user = new User();
        return view('user.create', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try{
            $role_ids = $request->get('roles');
            $user = new User();
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->username = $request->get('username');
            $user->mobile = $request->get('mobile');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->save();
            $user->roles()->sync($role_ids);

            //$user = User::create($request->all());
            return redirect(route('users.index'))->with('success' , 'user add with success');
        }catch (\Exception $ex) {
            return redirect(route('users.create'))->with('error', 'user not added')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        try{
            $roles = Role::pluck('name', 'id')->all();
            return view('user.edit', compact('user', 'roles'));
        }
        catch (\Exception $ex){
            Session::flash('info', 'le state avec id '.$user->name.' non trouvable');
            return redirect('/users');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        try{
            $role_ids = $request->get('roles');
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->username = $request->get('username');
            $user->mobile = $request->get('mobile');
            $user->email = $request->get('email');
            $user->save();
            $user->roles()->sync($role_ids, false);

            return redirect(route('users.index'))->with('success' , 'user add with success');
        }catch (\Exception $ex) {
            //return redirect(route('users.create'))->with('error', 'user not added');
            return redirect(route('users.create'))->with('error', $ex->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
