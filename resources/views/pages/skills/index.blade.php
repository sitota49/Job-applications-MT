@extends('pages.dashbord')
@section('panel')


<div id="list-example">
    <a href="skill/create" class="btn btn-primary">Create new skill</a>
 <br/>
 <br/>
 <h1>List of Skills</h1>
    <ul
    style="overflow:scroll;height:400px;" class="list-group mylist"  data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
            @forelse ($skills as $skill)
           <div class="list-group-item d-flex justify-content-between">
            <div class="text-center">{{$skill->name}}</div>
            <div class="d-flex justify-content-between">
                <div>
                    <a href="/skill/{{$skill->id}}/edit" type="button" class="btn btn-warning">
                        Edit
                    </a>
                </div>
              <div> &nbsp;&nbsp;</div>
              <div>
                <form method="POST" action="{{route('skill.destroy', $skill->id)}}">

                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    <button type="submit" name="delete" class=" btn btn-danger btn-sm" >Delete</button>
                </form>
              </div>

            </div>
           </div>
           <br/>
            @empty
            <br/><br/>
            <div class="text-center">No Skill available yet</div>
            @endforelse
    </ul>
</div>

@endsection
