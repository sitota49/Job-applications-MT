@extends('pages.company.dashbord')

@section('company')

<img src="https://i.pravatar.cc/300" width="200px" height="200px" style="border-radius:50%"/>

<div>
    <br/>
 <p> Name: <b>{{Auth::user()->name}} </b></p>
 <p> Email: <b>{{Auth::user()->email}}</b> </p>

</div>
@endsection
