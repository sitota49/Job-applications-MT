<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\UserRole;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data,;
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([

    //     ]);
    // }


   public function create(){
      $roles = Role::where('name', '!=', 'Admin');
       return view('auth.register.create')->with(['roles'=>$roles]);
   }

   public function store(Request $request)
   {

    $this->validate($request,[
        'name' => 'required |string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' =>'string|nullable',
        'address' => 'nullable|string',
        'role_id'=>'required|integer',
        'password' => 'min:8|required_with:password-confirm|same:password-confirm',
        'password-confirm' => 'min:8'
    ]);
        $users =new User;
        $user_role = new UserRole;



         $users->password = Hash::make($request->input('password'));
         $users->name =$request->input('name');
         $users->email = $request->input('email');

         $users->phone_number=$request->input('phone');
         $users->address = $request->input('address');

         $users->save();

         $user_role->user_id = $users->id;
         $user_role->role_id=$request->input('role_id');
         $user_role->save();





     return redirect('home')->with('success','you are successfully registered');
   }
}
