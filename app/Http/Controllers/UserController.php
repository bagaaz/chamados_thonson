<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public $chamado;
    public $roles;

    public function __construct()
    {
        $this->roles = collect(\App\Models\Role::all())->map(function ($role) {
            return [
                'id' => $role->id,
                'name' => $role->name,
            ];
        });
    }

    public function index()
    {
        $users = collect(User::all())->map(function ($user) {
            return [
                'id' => $user->id,
                'firstname' => $user->firstname,
                'email' => $user->email,
                'role' => $user->role->name,
            ];
        });

        return view("pages.users.users-list", compact('users'));
    }

    public function create()
    {
        $roles = $this->roles;

        return view("pages.users.users-form", compact('roles'));
    }

    public function store(UserRequest $request)
    {
        try {
            $request->merge(['password' => bcrypt('123456')]);
            $user = User::create([
                'username' => $request->username,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => $request->password,
                'role_id' => (int) $request->role_id,
            ]);

            return redirect()->route('users')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        $roles = $this->roles;

        return view("pages.users.users-form", compact('user', 'roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $user->update([
                'username' => $request->username,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'role_id' => (int) $request->role_id,
            ]);

            return redirect()->route('users')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            return redirect()->route('users')->with('success', 'Usuário excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
