@extends('pages.company.dashbord')

@section('company')
<div class="container">
    <h1>Job</h1>
    <h3>@if(count($jobs)==0)@endif You posted {{count($jobs)}} jobs 🚀</h3>
    <br />
    <div class="row m-2">
    @forelse ($jobs as $job)
    <div
    style="max-width: 18rem;"
class="card text-white bg-dark mb-3 m-2" >
        <div class="card-header">
            <h4 class="card-title">{{$job->title}}</h4></div>
        <div class="card-body">

          <p class="card-text">{{$job->description}}</p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <div>
                    <a href="/company/jobs/{{$job->id}}/edit" type="button" class="btn btn-warning">
                        Edit
                    </a>
                </div>
              <div> &nbsp;&nbsp;</div>
              <div>
                <form method="POST" action="{{route('jobs.destroy', $job->id)}}">

                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    <button type="submit" name="delete" class=" btn btn-danger btn-sm" >Delete</button>
                </form>
              </div>

            </div>
        </div>
      </div>
      <br/>
    @empty
        <div>
            <h1>No job posted yet</h1>
        </div>
    @endforelse
</div>

</div>

@endsection
