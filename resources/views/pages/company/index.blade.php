@extends('pages.company.dashbord')

@section('company')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="text-center">
                      @include('pages.company.dashbord')
                   </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
