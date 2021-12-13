@extends('pages.dashbord')
@section('panel')

<div>
    <h3>Role Types</h3>
   <br/>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">role</th>

          </tr>
        </thead>
        <tbody>
            @forelse ($roles as $role)
            <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>
            </tr>
            @empty
                <div>No roles</div>
            @endforelse
        </tbody>
      </table>

</div>


@endsection





