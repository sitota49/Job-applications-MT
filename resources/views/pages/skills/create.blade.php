@extends('pages.dashbord')
@section('panel')


<div class="container">
        <h1>Create a new skill</h1>
        {!! Form::open(['route' => 'skill.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">

            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <br/>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection
