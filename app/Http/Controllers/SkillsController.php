<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skill;

class SkillsController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $skills = Skill::all();

        return view('pages.skills.index')->with('skills', $skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required', 'string', 'max:255', 'unique:skills'],
        ]);

        $skills = new Skill;
        $skills->name=$request->input('name');
        $skills->save();
        return redirect('/skill')->with('success', 'New Skill is Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);

        //Check if skills exists before deleting
        if (!isset($skill)){
            return redirect('/skill')->with('error', 'No skills Found');
        }

        // Check for correct user
        // if(auth()->user()->id !==$skills->user_id){
        //     return redirect('/skill')->with('error', 'Unauthorized Page');
        // }


        return view('pages.skills.edit')->with(['skill'=>$skill]);
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
        $this->validate($request,[
            'name'=>['required', 'string', 'max:255', 'unique:skills'],
        ]);

        $skills = Skill::find($id);

        $skills->name=$request->input('name');
        $skills->save();
        return redirect('/skill')->with('success', 'Skill is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::find($id);
        //Check if post exists before deleting
        if (!isset($skill)){
            return redirect('/skill')->with('error', 'No Skill Found');
        }




        $skill->delete();
        return redirect('/skill')->with('success', 'Skill Removed');
    }
}
