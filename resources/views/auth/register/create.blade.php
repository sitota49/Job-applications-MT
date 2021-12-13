@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'register.store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}                   <div class="form-group">
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                    </div>
                    <br/>
                    <div class="form-group">
                        {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                    </div>
                    <br/>
                    <div class="form-group">
                        {{Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Password'])}}
                    </div>
                    <br/>
                    <div class="form-group">
                        {{Form::password('password-confirm',  ['class' => 'form-control', 'placeholder' => 'password-confirm'])}}
                    </div>
                    <br/>
                    <div class="form-group">
                        {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}
                    </div>
                    <br/>
                    <div class="form-group">
                        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone number'])}}
                    </div>
                    <br/>
                    <div class="form-group">
                        {{ Form::select('role_id', $roles->pluck('name', 'id'), 'role_id', ['class' => 'form-control w-100','placeholder' => 'select'])}}
                    </div>
                    <br/>
                    {{Form::submit('Register', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
