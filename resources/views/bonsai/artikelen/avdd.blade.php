@extends('layout')

@section('content')
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="panel-body">
            <div class="alert alert-success">
                <p>Artikel van de dag met 50% korting is beschikbaar om 11:00 t/m 15:00</p>
                <p>Om dit artikel te bestellen moet je twee artikelen in je winkel mandje hebben!</p>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        @foreach($artikelen as $artikel)
        @if($artikel['avdd'] == 1)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{$artikel->foto_locatie}}" alt="...">
                <div class="caption">
                    <h5>{{$artikel->artikel}}</h5>
                    <p >{{$artikel->omschrijving}}</p>
                    <?php $Qic = Session::has('cart') ? Session::get('cart')->totalQty : '';?>

                    @if($Qic >= 2)
                    <p><strike>{{$artikel->prijs }}</strike> &#8364;{{number_format($artikel->prijs *0.5, 2, '.', ',')}}</p>
                        @else
                        <p>&#8364;{{$artikel->prijs }}</p>

                    @endif
                    <p></p><a href="/add/{{$artikel->id}}" class="btn btn-primary" role="button">add to cart</a>{{--<a href="/remove/{{$artikel->id}}" class="btn btn-warning" role="button">remove from cart</a> </p>--}}
                </div>
            </div>
        </div>
            @endif
       @endforeach
    </div>
@endsection