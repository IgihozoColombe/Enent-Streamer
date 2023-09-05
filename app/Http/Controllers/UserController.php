<?php

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    // ... (other methods)

    public function register(Request $request)
    {
        // Check if the user wants to register via OAuth
        if ($request->input('oauth_provider')) {
            $provider = $request->input('oauth_provider');

            // Validate the provider (Google or Facebook)
            if (!in_array($provider, ['google', 'facebook'])) {
                return response()->json(['message' => 'Invalid provider'], 400);
            }

            // Redirect to the OAuth provider for registration
            return Socialite::driver($provider)->stateless()->redirect();
        }

        // If not using OAuth, perform normal email/password registration
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = \App\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken('StreamEvents')->accessToken;

        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        // Check if the user wants to log in via OAuth
        if ($request->input('oauth_provider')) {
            $provider = $request->input('oauth_provider');

            // Validate the provider (Google or Facebook)
            if (!in_array($provider, ['google', 'facebook'])) {
                return response()->json(['message' => 'Invalid provider'], 400);
            }

            // Redirect to the OAuth provider for login
            return Socialite::driver($provider)->stateless()->redirect();
        }

        // If not using OAuth, perform normal email/password login
        $loginData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($loginData)) {
            $user = Auth::user();
            $token = $user->createToken('StreamEvents')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
