@extends('layout')

@section('content')


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid d-block" src="images/next_login.jpg">
                </div>
                <div class="bg-faded py-4 col-md-4">
                    <div class="col-md-12">
                        <h4 class="pi-draggable " draggable="true">Register</h4>
                    </div>
                    @include('auth.register')
                </div>
            </div>
        </div>
    </div>

@endsection