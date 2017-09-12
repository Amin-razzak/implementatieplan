@extends('layout')

@section('content')

    <div class="py-5">
        <div class="container">
            @if($errors->any())
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        {{$errors->first()}}.
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <img class="img-fluid d-block" src="images/next_login.jpg">
                </div>
                <div class="bg-faded py-4 col-md-4">
                    @if (Auth::guest())
                        @include('auth.login')

                    @else
                        <div class="col-md-12">
                            <h4 class="pi-draggable " draggable="true">Welkom {{ Auth::user()->name }} !</h4>
                        </div>
                    @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="col-md-12 p-0" style="border-bottom:1px black solid;">
                    </div>
                </div>

                </div>
            <div class="row">

                <div class="col-md-8">

                    <p class=""> Welkom op de Bonsai webshop Bonsai verkoop vanuit het oosten van Nederland. Bij Bouwhuis en Tuin te Haaksbergen Twente / Overijssel vindt u de mooiste bonsai en bonsai benodigdheden voor interessante prijzen. Vanuit de oosterse tuin in Twente
                        / Overijssel worden al jaren bonsai en bijbehorende artikelen verkocht tot op heden is bonsai tuin geopend op afspraak, u bent dan uiteraard van harte welkom. U vindt op deze site bonsai voor elk gewenst budget en in ieder stadium van ontwikkeling,
                        van startmateriaal tot vergevorderd.
                </div>
            </div>
                <div class="row">
                    @foreach($artikelen as $artikel)
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img src="{{$artikel->foto_locatie}}" alt="...">
                                <div class="caption">
                                    <h5>{{$artikel->artikel}}</h5>
                                    <p >{{$artikel->omschrijving}}</p>
                                    <p>{{$artikel->prijs}} <a href="/add/{{$artikel->id}}" class="btn btn-primary" role="button">add to cart</a> </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

    </div>
    </div>
@endsection