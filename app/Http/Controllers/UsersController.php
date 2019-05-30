<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->roles()->sync($request->input('roles', []));

        return redirect()
            ->route('users.index')
            ->withFlashSuccess(__('strings.user-created-successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('roles');
        $newCreatedAt = $this->customFormatDate($user->created_at);
        $newUpdatedAt = $this->customFormatDate($user->updated_at);

        return view('users.show', compact('user', 'newCreatedAt', 'newUpdatedAt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  obj  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $user->load('roles');

        return view('users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  obj  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->only('name', 'email', 'password'));
        $user->roles()->sync($request->input('roles', []));
        
        return redirect()
            ->route('users.index')
            ->withFlashSuccess(__('strings.user-updated-successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  obj  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->back()
            ->withFlashSuccess(__('strings.user-deleted-successfully'));
    }

    public function customFormatDate($customDate) {
        $unixDate = strtotime($customDate);
        $dateFormatted = date('d-m-Y', $unixDate);

        return $dateFormatted;
    }
}
