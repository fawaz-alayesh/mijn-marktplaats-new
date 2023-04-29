<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function index()
    {
        return view('auth.update');
    }

    public function update(Request $request)
    {
        // Validate the input
        $request->validate([
            'firstname' => ['nullable','string', 'max:20'],
            'lastname' => ['nullable','string', 'max:20'],
            'email' => ['nullable','string', 'email', 'max:30', 'unique:users,email,' . Auth::id()], // Modified validation rule
            'tel' => ['nullable','string', 'regex:/^\+\d{2}\d{9}$/'],
            'password' => ['nullable','string', 'min:8', 'confirmed'],
        ]);
    
        // Update the user's profile
        $user = Auth::user();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->tel = $request->input('tel');
        $user->email = $request->input('email');
    
        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }
    
        $user->save();
    
        // Redirect the user back to the update profile page with a success message
        return redirect()->route('updateprofile')->with('message', 'Profiel succesvol bijgewerkt!');
    }
    
}
