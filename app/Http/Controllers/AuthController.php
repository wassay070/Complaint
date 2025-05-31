<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // Show Signup Form
    public function showSignupForm()
    {
        return view('sign_up');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('user')) {
                return redirect()->intended('/add-complaints')->with('success', 'Welcome User!');
            } elseif ($user->hasRole('resolver')) {
                return redirect()->route('resolver.dashboard');
            }

        }

        return back()->withErrors(['email' => 'Invalid email or password']);
    }
    

    // Register New User
    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|digits_between:10,15|unique:users,phone',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'user', // Default role
        ]);
        $user->assignRole('user');

        // Redirect with success message
        return redirect()->route('signup.form')->with('success', 'Registration successful! You can now log in.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $resolver = User::findOrFail($id);
        return view('edit', compact('resolver'));
    }

    public function update(Request $request)
    {

        $id = Auth::user()->id;
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:15',
            'password' => 'nullable|string|min:6',
        ]);

        $resolver = User::findOrFail($id);
        
        $data = $request->only(['name', 'email', 'phone']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); 
            $data['plain_password'] = $request->password;
        }

        $resolver->update($data);

       if(Auth::user()->hasRole('resolver')) {
            return redirect()->route('resolver.dashboard')->with('success', 'Profile updated successfully.');
        } elseif(Auth::user()->hasRole('user')) {
            return redirect()->route('add-complain')->with('success', 'Profile updated successfully.');
        }
    }

}
