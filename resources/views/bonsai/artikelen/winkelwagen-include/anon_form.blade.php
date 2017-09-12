<form class="form-horizontal" role="form" method="POST" action="/bestel">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-12 control-label">Naam</label>

        <div class="col-md-12">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
        <label for="lastname" class="col-md-12 control-label">Achternaam</label>

        <div class="col-md-12">
            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

            @if ($errors->has('lastname'))
                <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-12 control-label">Adres</label>

        <div class="col-md-12">
            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

            @if ($errors->has('address'))
                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('postalcode') ? ' has-error' : '' }}">
        <label for="postalcode" class="col-md-12 control-label">Postcode</label>

        <div class="col-md-12">
            <input id="postalcode" type="text" class="form-control" name="postalcode" value="{{ old('postalcode') }}" required autofocus>

            @if ($errors->has('postalcode'))
                <span class="help-block">
                                        <strong>{{ $errors->first('postalcode') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-12 control-label">E-Mail</label>

        <div class="col-md-12">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('oms') ? ' has-error' : '' }}">
        <label for="oms" class="col-md-12 control-label">Opmerking</label>

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
            <a href="/reset" class="btn btn-success">
                klik hier om uw winkel wagen te legen.
            </a>
            <button type="submit" class="btn btn-success">
                bestellen voor vactuur
            </button>
        </div>
    </div>
</form>