<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::where('id', auth()->user()->id)->get();
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
            'name' => 'string',
            'old_password' => 'string',
            'new_password' => 'string',
            'phone_number'=> 'string',
            'address'=> 'string',
        ]);

        $user = User::find(auth()->user()->id);
    
        if($user){
           
        if($request->has('name')){
            $user->name = $fields['name'];
        }
    
        if($request->has('old_password') &&$request->has('new_password') && bcrypt($fields['old_password'])==$user->pasword && $fields['old_password']!= $fields['new_password']){
            $user->password = bcrypt($fields['new_password']);
        }

        if($request->has('phone_number')){
            $user->phone_number = $fields['phone_number'];
        }

         if($request->has('address')){
            $user->address = $fields['address'];
        }

         
        $user->save();
         }
        
          return response()->json($user, 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $user = User::find(auth()->user()->id);
          $user->delete();
    }
}
