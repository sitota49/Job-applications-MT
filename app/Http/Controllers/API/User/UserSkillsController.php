<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserSkill;

class UserSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return UserSkill::where('user_id', auth()->user()->id)->get();
        // return auth()->user()->userSkills();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $fields = $request->validate([
            'skills' => 'required',
                       
        ]);

        $user_skills=[];

       foreach($fields['skills'] as $skill)
       {

      
            $userSkill = UserSkill::where([['skill_id',$skill['skill_id']],['user_id',auth()->user()->id]])->first();
            
            if($userSkill){

                
                $user_skill->level = $skill['level']; } 
            else
            {               
            $user_skill = new UserSkill;
            $user_skill->user_id = auth()->user()->id;
            $user_skill->skill_id = $skill['skill_id'];
            $user_skill->level = $skill['level'];
           
            }

            $user_skill->save();

            array_push($user_skills, $user_skill);
       }
       
       return $user_skills;
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $fields = $request->validate([
            'skills' => 'required',           
        ]);

         $user_skills=[];

        foreach($request->input('skills') as $skill)
       {
            $userSkill = UserSkill::where('id',$skill['user_skill_id'])->first();
            if($userSkill){
                $userSkill->level = $skill['level'];
                $userSkill->save();
            }
       }

        return $user_skills;
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_skill = UserSkill::find($id);
        $user_skill->delete();
    }
}
