                                               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">Correo electrónico</label>
                                                
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="example@uniquindio.edu.co">
                                                    </div>
                                                    @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">Teléfono</label>
                                                
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                        <input type="text" class="form-control" name="telefono" value="{{ Auth::user()->telefono }}" placeholder="3007645231">
                                                    </div>
                                                    @if ($errors->has('telefono'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('telefono') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">
                                                <label class="col-md-4 control-label">Imagen de usuario</label>

                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                                        <input type="file" class="form-control" name="imagen">

                                                    </div>
                                                    @if ($errors->has('imagen'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('imagen') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                    </i>Actualizar datos
                                                </button>
                                            </div>
                                        </div>