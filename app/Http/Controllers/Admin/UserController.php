<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserWasCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::allowedUsers()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new User);

        $user = new User;
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view (
            'admin.users.create',
            compact('user', 'roles','permissions', 'user')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);

        // Validamos el request
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        // el password se encriptara en automatico por el mutador en el modelo User
        $data['password'] = Str::random(8);

        // Creamos al usuario
        $user = User::create($data);

        // Assignamos los permisos
        $user->assignRole($request->roles);

        // Asignamos los permisos
        $user->givePermissionTo($request->permissions);

        // Enviamos Email
        UserWasCreated::dispatch($user, $data['password']);

        // Respondemos al usuario
        return redirect()->route('admin.users.index')
            ->with('success', "El usuario $user->name ha sido registrado");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return view ('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');

        return view (
            'admin.users.edit',
            compact('user', 'roles','permissions')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update( $request->validated() );

        return redirect()->route('admin.users.edit', $user)
            ->with('success', 'Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'El usuario ha sido eliminado correctamente');
    }
}
