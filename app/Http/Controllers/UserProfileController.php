<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        try {
            $attributes = $request->validate([
                'username' => ['required', 'max:255', 'min:2'],
                'firstname' => ['max:100'],
                'lastname' => ['max:100'],
                'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            ]);

            auth()->user()->update([
                'username' => $request->get('username'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
            ]);
            return back()->with('succes', 'Perfil atualizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar perfil!');
        }
    }

    public function updatePassword(PasswordRequest $request)
    {
        try {
            $user = DB::table('users')->where('email', Auth::user()->email)->first();
            DB::table('users')->where('email', $user->email)->update([
                'password' => bcrypt($request->get('new_password')),
            ]);
            return back()->with('succes', 'Senha atualizada com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors('error', 'Erro ao atualizar senha! - ' . $e->getMessage());
        }
    }
}
