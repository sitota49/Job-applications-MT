<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $role= UserRole::where('user_id','=',auth()->user()->id)->get();

       if($role[0]->role_id == 1){
          return view('home');
       }else if($role[0]->role_id ==2){
        return view('pages.seeker.index');
       }else{
        return view('pages.company.index');
       }
    }
}
