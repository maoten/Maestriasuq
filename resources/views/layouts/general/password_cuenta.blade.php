 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Contraseña</label>

    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="*******">


        </div>
        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">Confirmar contraseña</label>

    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
            <input type="password" class="form-control" name="password_confirmation" placeholder="*******">
        </div>
        @if ($errors->has('password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
        </i>Cambiar contraseña
    </button>
</div>
</div>