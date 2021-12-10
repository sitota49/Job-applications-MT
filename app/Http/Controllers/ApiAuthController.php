<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Skill;
use App\Models\UserRole;
use App\Models\UserSkill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request) {

       
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'phone_number'=> 'required|string',
            'address'=> 'required|string',
            'role'=> 'required|string',
            'skill'=> 'string',
            'level'=> 'string'
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

        if($role->name == 'Seeker'){

    if($fields['skill']) {
        $skill = Skill::where('name',  $fields['skill'])->first();
        
        if($skill == null) {
            $skill = new Skill;
            $skill->name = $fields['skill'];
            $skill->save();
        }

        $user_skill = new UserSkill;
        $user_skill->user_id = $user->id;
        $user_skill->skill_id = $skill->id;
        $user_skill->level = $fields['level'];
        $user_skill->save();
    }
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
