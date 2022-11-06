<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
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
    public function register()
    {
        return view('auth/register');
    }

    public function registerVerify(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
            'rol_type' => 'required',
        ]);
        $user = new User();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = bcrypt($request->post('password'));
        $user->rol = $request->post('rol_type');
        $user->save();

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('redirect', Auth::id());
        }

        return back()->withErrors(['invalid_credentials' => 'Usuario o contraseña invalido'])->withInput();
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'sesion cerrada correctamente');
    }

    public function redirect($id)
    {
        $user = User::find($id);
        if ($user->rol === "Comprador") {
            return redirect()->route('showComprador', $id);
        }
        if ($user->rol === "Vendedor") {
            return redirect()->route('showVendedor', $id);
        }
    }
}
