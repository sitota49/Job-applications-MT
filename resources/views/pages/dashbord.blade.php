@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-between">
        <div class="p-2">
            <div>
                <img src="{{ asset('job-ninja.png')}}" class="text-center" width="200"/>

                <a class="p-3 mb-2 bg-white  text-white d-flex justify-content-start" href="/role">
                    <img class="ml-2" src="https://img.icons8.com/external-tal-revivo-filled-tal-revivo/24/000000/external-users-under-five-pointed-star-lead-role-business-filled-tal-revivo.png"/>
               <br/>
                    <div class="ml-2 text-secondary">Role</div>
                </a>
                <br/>
                <a class="p-3 mb-2 bg-white  text-white d-flex justify-content-start" href="/user">
                    <img src="https://img.icons8.com/color/24/000000/user.png"/>
                    <br/>
                    <div class="ml-2 text-secondary">User</div>
                </a>
                <br/>
                <a class="p-3 mb-2 bg-white  text-white d-flex justify-content-start" href="/skill">
                    <img src="https://img.icons8.com/ios-filled/50/000000/development-skill.png" width="20px"/>
                    <br/>
                    <div class="ml-2 text-secondary">Skill</div>
                </a>
            </div>
        </div>
        <div class="p-2 container-fluid">
           <div >
            @yield('panel')
           </div>
        </div>
      </div>


@endsection
