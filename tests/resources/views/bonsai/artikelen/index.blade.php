@extends('layout')

@section('content')
<br><br>
    <div class="row">
        @foreach($artikelen as $artikel)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{$artikel->foto_locatie}}" alt="...">
                <div class="caption">
                    <h5>{{$artikel->artikel}}</h5>
                    <p >{{$artikel->omschrijving}}</p>
                    <p>{{$artikel->prijs}} <a href="/add/{{$artikel->id}}" class="btn btn-primary" role="button">add to cart</a><a href="/remove/{{$artikel->id}}" class="btn btn-warning" role="button">remove from cart</a> </p>
                </div>
            </div>
        </div>
       @endforeach
    </div>
@endsection