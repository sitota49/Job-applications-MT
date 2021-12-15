<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Skill;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\UserSkill;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
     public function register(Request $request) 
    {       
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'phone_number'=> 'required|string',
            'address'=> 'required|string',
            'role'=> 'required|string',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone_number' => $fields['phone_number'],
            'address' => $fields['address'],
        ]);

        $role = Role::where('name', $fields['role'] )->first();
        
        if($role) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $role->id;
            $user_role->save();
        }

    
        $token = $user->createToken('secrettoken')->plainTextToken;

        $response = [
            'user' => $user,
            'role'=> $role->name,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        $token = $user->createToken('secrettoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];

      

    }
}
