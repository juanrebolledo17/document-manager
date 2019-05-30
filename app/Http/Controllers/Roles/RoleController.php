<?php

namespace App\Http\Controllers\Roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $role = Role::create($request->only('name'));
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('roles.index')->withFlashSuccess(__('strings.role-created-successfully'));

        // if ($this->roleExists($request->name) {
        //     throw new GeneralException('A role already exists with the name '.$data['name']);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {
        $role = Role::findOrFail($role);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $role)
    {
        $role = Role::findOrFail($role);
        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('roles.index')->withFlashSuccess(__('strings.role-updated-successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        $role = Role::findOrFail($role);
        $role->delete();
        return redirect()->route('roles.index')->withFlashSuccess(__('strings.role-deleted-successfully'));
    }

    protected function roleExists($name) : bool
    {
        return $this->model
                ->where('name', strtolower($name))
                ->count() > 0;
    }
}
