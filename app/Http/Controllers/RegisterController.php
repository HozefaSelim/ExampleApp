<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {

        return view('auth.register');
    }
    public function register(Request $request)
    {

        // do validation
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', "unique:users"],
            'password' => ['required', 'min:5', "confirmed"],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images/users'), $imageName);

            $validatedData['image'] = $imageName;
        }
        //  $user = $this->createUser($validatedData);
        $user = User::create($validatedData);

        Auth::login($user);

        return redirect()->route("home");
    }

    // public function createUser(array $data)
    // {

    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password'])

    //     ]);
    // }
}
