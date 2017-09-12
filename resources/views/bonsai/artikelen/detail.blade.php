@extends('layout')

@section('content')

<br>
    <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="thumbnail">
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                                <img src="../{{$artikel->foto_locatie}}" alt="...">
                        </div>
                        <div class="col-sm-12 col-md-9">
                                <div class="caption">
                                    <h5>{{$artikel->artikel}}</h5>
                                    <p >{{$artikel->omschrijving}}</p>
                                    <p>{{$artikel->prijs}}  <a href="/add/{{$artikel->id}}" class="btn btn-primary" role="button">add to cart</a></p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class="thumbnail" style="background-color:white!important;">
                                NAN
                                    {{--<div class="caption">--}}
                                        {{--<h5>Reviews</h5>--}}
                                        {{--<p>Klant: </p>--}}
                                        {{--<p>Beoordeling: </p>--}}
                                        {{--<p>Lorem</p>--}}
                                    {{--</div> <a href="/review/{{$artikel->id}}" class="btn btn-warning" role="button">schrijf een recensie</a> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection