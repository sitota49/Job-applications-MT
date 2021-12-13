@extends('pages.company.dashbord')

@section('company')
<div class="container">
    <h1>Edit The Job 💳</h1>
    <br />
    {!! Form::open(['route' =>[ 'jobs.update',$job->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('title', $job->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <br/>
        <div class="form-group">
            {{Form::textarea('description', $job->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <br/>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Update job', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


</div>

@endsection
