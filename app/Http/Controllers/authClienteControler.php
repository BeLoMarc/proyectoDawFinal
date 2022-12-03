<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class authClienteControler extends Controller
{
    public function formularioRegistrarCliente()
    {
      //  return view('auth.login');
      return view('formularioLogginCliente');
    }  
      
    public function autenticarCliente(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'contraseña' => 'required',
        ]);
   
        $credentials = $request->only('email', 'contraseña');
        if (Auth::guard('cliente')->attempt($credentials)) {
          return "exito de login";
            //  return redirect()->intended('dashboard')
           //             ->withSuccess('Signed in');
        }
        return "fallo de login";
       // return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
       // return view('auth.registration');
       return view('crearCliente');

    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes',
            'contraseña' => 'required|min:4',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
        return "registro correcto" ;
      //  return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return cliente::create([
        'name' => $data['nombre'],
        'email' => $data['email'],
        'contraseña' => Hash::make($data['contraseña'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}