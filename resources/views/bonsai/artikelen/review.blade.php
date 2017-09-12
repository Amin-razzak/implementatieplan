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
                                </div>
                        </div>
                    </div>@if (Auth::guest())
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <div class="thumbnail" style="background-color:white!important;">
                                    Log in om een review te kunnen schrijven.
                                </div>
                            </div>
                        </div>

                              @else
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class="thumbnail" style="background-color:white!important;">
                                    <div class="caption">
                                        <h5>Reviews</h5>
                                        <p>Klant: </p>
                                        <p>Beoordeling: </p>
                                        <p>Lorem</p>

                                        <form class="form-horizontal" role="form" method="POST" action="/bestel">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('beoordeling') ? ' has-error' : '' }}">
                                                <label for="beoordeling" class="col-md-12 control-label">Beoordeling: (1 t/m 5)</label>

                                                <div class="col-md-2">
                                                    <input id="beoordeling" type="number" min="1" max="5" class="form-control" name="beoordeling" value="1" required>

                                                    @if ($errors->has('beoordeling'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('beoordeling') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('oms') ? ' has-error' : '' }}">
                                                <label for="oms" class="col-md-12 control-label">Recensie:</label>

                                                <div class="col-md-12">
                                                    <textarea id="oms" class="form-control" name="oms" value="{{ old('oms') }}" required autofocus></textarea>

                                                    @if ($errors->has('oms'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('oms') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12 ">
                                                    <button type="submit" class="btn btn-warning">
                                                        schrijf een recensie
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>


                    @endif
                </div>
            </div>
    </div>
@endsection