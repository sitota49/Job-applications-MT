@extends('layouts.app')
@section('content')
<h2 class="container">Hello {{strtoupper(Auth::user()->name)}} 🙋</h2>
    <div class="container d-flex justify-content-between">
        <div class="p-2">
            <div>
                <img src="{{ asset('job-ninja.png')}}" class="text-center p-3 mb-2 bg-white" width="200"/>

                <a class="p-3 mb-2 bg-white  text-white d-flex justify-content-between" href="/company/profile">
                    <img src="https://img.icons8.com/color/24/000000/user.png"  width="30"/>
                    <div class="ml-2 text-secondary">Profile</div>
                </a>
                <br/>
                <a class="p-3 mb-2 bg-white  text-white d-flex justify-content-between" href="/company/jobs/create">
                    <img src="https://img.icons8.com/office/16/000000/add-folder--v2.png"  width="30"/>                    <br/>
                    <div class="ml-2 text-secondary">Post Job</div>
                </a>
                <br/>
                <a class="p-3 mb-2 bg-white  text-white d-flex justify-content-between" href="/company/jobs">
                    <img src="https://img.icons8.com/office/16/000000/find-matching-job.png"  width="30"/>                    <br/>
                    <div class="ml-2 text-secondary">Jobs</div>
                </a>
                <br/>
                <a class="p-3 mb-2 bg-white  text-white d-flex justify-content-between" href="/company/applications">
                    <img src="https://img.icons8.com/office/16/000000/send-job-list.png"  width="30"/>
                  <div class="ml-2 text-secondary">Applicants</div>
                </a>
            </div>
        </div>
        <div class="p-2 container-fluid">
           <div class="container-fluid text-center" >
            @yield('company')
           </div>
        </div>
      </div>


@endsection
