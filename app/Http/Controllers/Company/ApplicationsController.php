<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\Application;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\Skill;




class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $job = null;
        $users = null;
       $application = Application::all();

       foreach ($application as $app){
        $job = Job::where('id','=',$app->job_id)
        ->where('user_id','=',auth()->user()->id)->get();

       $users = User::where('id','=',$app->seeker_id)->get();
       }



       return view('pages.company.application.index')->with(
           [
        'jobs'=>$job,
       'applications'=>$application,
       'users'=>$users
    ]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =User::find($id);



        $skills = UserSkill::where('user_id','=',$id)->get();




        // dd($skills);
        foreach($skills as $skill){
            $myskill = Skill::where('id','=',$skill->skill_id)->get();

            // dd($skill->skill_id);
             $level = $skill->level;
             return view('pages.company.application.show')->with(['skills'=>$myskill,'user'=>$user,'level'=>$level]);
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
