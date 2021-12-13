@extends('pages.company.dashbord')

@section('company')
<div class="container">
    <h1>Detail</h1>
    <br />


        <div class="container">
            <img src="https://i.pravatar.cc/300" width="150px" height="150px" style="border-radius:50%"/>
           <br/>
            <p class="">Applicants Name :<b>{{$user->name}}</b></p>
               <h5>Skills</h5>
               <br/>

           @foreach ($skills as $skill)
                  <div class="text-bold bg-success p-2 text-white" style="display: inline; border-radius: 14px; margin: 10px;">
                      {{$skill->name}}

                    </div>
                    <p>{{$level}}</p>
           @endforeach

                <h5>Contact</h5>
                <div>
                    phone: {{$user->phone_number}}
                </div>
                <div>
                    Email: {{$user->email}}
                </div>

        </div>



</div>
@endsection
