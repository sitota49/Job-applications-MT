@extends('pages.company.dashbord')

@section('company')
<div class="container">
    <h1>Job</h1>
    <h3>@if(count($applications)==0)@endif You have {{count($applications)}} applications 🚀</h3>
    <br />
    <div class="row m-2">
    @forelse ($users as $user)
    <a
    href="/company/applications/{{$user->id}}"
    style="text-decoration: none; max-width: 18rem;"
class="card text-white bg-secondary  mb-3 m-2 p-1" >
        <div class="">
            <p class="card-title"><b>{{$user->name}}</b> is applied for
                @foreach ($jobs as $job )
                    <div>{{$job->title}} job</div>
                @endforeach
            </p></div>
      </a>
    @empty
        <div>
            <h1>No one is applied yet 😞</h1>
        </div>
    @endforelse
</div>
</div>
@endsection
