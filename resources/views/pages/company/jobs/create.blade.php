@extends('pages.company.dashbord')

@section('company')
<div class="container">
    <h1>Post New Job 📬</h1>
    <br />
    {!! Form::open(['route' => 'jobs.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <br/>
        <div class="form-group">
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <br/>
        {{Form::submit('Post job', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


</div>

@endsection
