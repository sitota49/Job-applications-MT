<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create new role
      

        $adminRole = new Role;
        $adminRole->name = 'Super Admin';
        $adminRole->save();

        $recruiterRole = new Role;
        $recruiterRole->name = "Recruiter";
        $recruiterRole->save();

        $seekerRole = new Role;
        $seekerRole->name = "Seeker";
        $seekerRole->save();
    }
}
