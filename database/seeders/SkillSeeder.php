<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frontEndSkill = new Skill;
        $frontEndSkill->name = 'Front End Development';
        $frontEndSkill->save();

        $backEndSkill = new Skill;
        $backEndSkill->name = 'Back End Development';
        $backEndSkill->save();

        $fullStackEndSkill = new Skill;
        $fullStackEndSkill->name = 'FullStack Development';
        $fullStackEndSkill->save();
    }
}
