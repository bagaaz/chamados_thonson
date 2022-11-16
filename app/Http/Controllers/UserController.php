<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function auth() {
        return view('welcome');
    }

    public function list() {
        $users = User::paginate(8);

        return view('user.users', compact('users'));
    }

    public function form() {
        return view('user.form');
    }

    public function create(Request $request) {
        dd('Rota de Criação');
    }

    public function remove($idUser) {
        $user = User::find($idUser)->delete();

        return redirect()->route('user.list');
    }
}
