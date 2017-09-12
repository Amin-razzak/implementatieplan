@extends('layout')

@section('content')
    <br><br>
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <strong>{{ $product['item']['artikel'] }}</strong>
                            <strong>{{ $product['item']['id'] }}</strong>
                            <br>
                            <span>Aantal: {{ $product['qty'] }}</span>
                            <br>
                            <span class="label label-success">{{ $product['price'] }}</span>
                            {{--<div class="btn-group">--}}
                            {{--<a type="button" class="btn btn-success btn-xs dropdown-toogle" data-toggle="dropdown">Action <span class="caret"></span></a>--}}
                            {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">1</a></li>--}}
                            {{--<li><a href="#">Reduce All</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                        </li>
                    @endforeach
                    <li class="list-group-item">
                        <strong>Totale prijs: {{ $totalPrice }}</strong>
                        @if (Auth::guest())
                        @else


                                    <button type="button" style="margin-left:50%;" class="btn btn-success">bestelen</button>

                        @endif
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-6">
                @if (Auth::guest())
                    @include('bonsai.artikelen.winkelwagen-include.anon_form')
                @else
                    <div class="col-md-12">
                        <h4 class="pi-draggable " draggable="true">Klik op bestellen {{ Auth::user()->name }} om verder te gaan.</h4>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{ $totalPrice }}</strong>
            </div>
        </div>

    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Je winkel wagen is leeg</h2>
            </div>
        </div>
    @endif



@endsection