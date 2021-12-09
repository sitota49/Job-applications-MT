<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\Skill;
use App\Models\UserSkill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create new user
        $user = new User;
        $user->name = 'Aman';
        $user->email = 'aman@gmail.com';
        $user->password = Hash::make("12345678");
        $user->phone_number = '0911111111';
        $user->address = 'Addis Ababa, Ethiopia';
        $user->save();

        // Find admin Role
        $adminRole = Role::where('name', 'Super Admin')->first();
        
        if($adminRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $adminRole->id;
            $user_role->save();
        }
        

       
        $user2 = new User;
        $user2->name = 'Abebe';
        $user2->email = 'abebe@gmail.com';
        $user2->password = Hash::make("12345678");
        $user2->phone_number = '0911111112';
        $user2->address = 'Addis Ababa, Ethiopia';
        $user2->save();

        $recruiterRole = Role::where('name', 'Recruiter')->first();
        
        if($recruiterRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user2->id;
            $user_role->role_id = $recruiterRole->id;
            $user_role->save();

        }

        $user3 = new User;
        $user3->name = 'Mahlet';
        $user3->email = 'mahlet@gmail.com';
        $user3->password = Hash::make("12345678");
        $user3->phone_number = '0911111113';
        $user3->address = 'Addis Ababa, Ethiopia';
        $user3->save();

        
        $seekerRole = Role::where('name', 'Seeker')->first();
        
        if($seekerRole) {
            // Create role for new user
            $user_role = new UserRole;
            $user_role->user_id = $user3->id;
            $user_role->role_id = $seekerRole->id;
            $user_role->save();
        }

        $frontEndSkill = Skill::where('name', 'Front End Development')->first();
        
        if($frontEndSkill) {
            // Create role for new user
            $user_skill = new UserSkill;
            $user_skill->user_id = $user3->id;
            $user_skill->skill_id = $frontEndSkill->id;
             $user_skill->level = "Beginner";
            $user_skill->save();
        }


    }
}
