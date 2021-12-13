<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('user_id','=',auth()->user()->id)->get();

        return view('pages.company.jobs.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.company.jobs.create');
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
           'title' =>'required|string',
           'description' =>'required|string|max:255'
       ]);

        $jobs = new Job;

        $jobs->title=$request->input('title');
        $jobs->description=$request->input('description');
        $jobs->user_id=auth()->user()->id;
        $jobs->save();

        return redirect('company/jobs');
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
      $job = Job::find($id);

      return view('pages.company.jobs.edit')->with('job', $job);
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
            'title' =>'required|string',
            'description' =>'required|string|max:255'
        ]);

        $job = Job::find($id);

        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->save();

        return redirect('/company/jobs')->with('success','your job is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);

        $job->delete();
        return redirect('/company/jobs')->with('success','your job is deleted successfully');

    }

    public function profile(){

        return view('pages.company.profile');
    }
}
