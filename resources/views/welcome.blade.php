@extends('layouts.app')

@section('content')

<div class="container center">
<div class="font-weight-bold">
<h1 class="text-center"> Welcome to
    <img src="{{asset('job-ninja.png')}}" width="100" />
</h1>
<div class="text-center">
    <a href="/home" class="btn btn-primary">
        get started!
    </a>
</div>

</div>
</div>

@endsection
