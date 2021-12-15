<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;

class UserJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  return Job::where('user_id', auth()->user()->id)->get();
        return User::where('id', auth()->user()->id)->with('jobs')->get();
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
            'title' => 'required|string',
            'description' => 'required|string',
            
        ]);

        $job = Job::create([
            'title' => $fields['title'],
            'description' => $fields['description'],
            'user_id'=> auth()->user()->id,
        ]);

         $response = [
            'job' => $job,
        ];

        return response($response, 201);

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
            'title' => 'string',
            'description' => 'string',
            'job_id' => 'string',
          
        ]);

        $job = Job::where('id',$fields['job_id'])->first();
    
        if($job){
           
        if($request->has('title')){
            $job->title = $fields['title'];
        }
          

        if($request->has('description')){
            $job->description = $fields['description'];
        }
   
         
        $job->save();
         }
        
        return response()->json($job, 200);

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
    }
}
