@extends('pages.dashbord')
@section('panel')
<div>
    <h3>User List</h3>
    <br/>
     <table class="table">
         <thead>
           <tr>
             <th scope="col">#</th>
             <th scope="col">Name</th>
             <th scope="col">email</th>
             <th scope="col">role</th>
           </tr>
         </thead>
         <tbody>
             @forelse ($users as $user)

                 @if(Auth::user()->id == $user->id)
                 <tr class=" bg-dark text-white">
                @endif

                 <th scope="row">{{$user->id}}</th>
                 <td>{{$user->name}}</td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->role}}</td>
                </tr>



             @empty
                 <div>No roles</div>
             @endforelse
         </tbody>
       </table>
</div>
@endsection
