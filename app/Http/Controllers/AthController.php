<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AthController extends Controller
{
    public function index()
    {
        return view('auth.login',[
            
        ]);
    }

    public function login(LoginRequest $request){

        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            return redirect()->route('admin.user.list');
        }

        return redirect()->route('/');
    }

    public function dang_ki()
    {
        return view('auth.singin',[
            
        ]);
    }

    public function add(AddRequest $request)
    {

        $user = new User();

        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $user->status = 0;
        $user->username = 'Vũ';
        $user->phone = '0978942425';
        // $user->room_id = 0;

        $user->save();
        return redirect()->route('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('/');
    }

    
}
