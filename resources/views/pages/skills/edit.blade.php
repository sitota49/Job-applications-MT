@extends('pages.dashbord')
@section('panel')

{!! Form::open(['route' => ['skill.update', $skill->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('name', 'Name')}}
    {{Form::text('name', $skill->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
</div>

{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
