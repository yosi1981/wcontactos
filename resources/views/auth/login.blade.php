@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row" >

        <div class="col-md-8 col-md-offset-2" style="top:200px;left:60px">
                    <div class="tableefecto widget-box widget-color-blue ui-sortable-handle" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-table">
                                </i>
                               Acceso
                            </h6>
                        </div>
                        <div class="widget-body" style="display: block;">
                    <form action="{{ route('login') }}" class="form-horizontal" method="POST" role="form">
                        {{ csrf_field() }}

                            <div class="widget-main ">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="email">
                                            email
                                        </label>
                                        <div class="col-md-6">
                                            <input autofocus="" class="form-control" id="email" name="email" required="" type="email" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>
                                                        {{ $errors->first('email') }}
                                                    </strong>
                                                </span>
                                                @endif
                                            </input>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label" for="password">
                                            password
                                        </label>
                                        <div class="col-md-6">
                                            <input class="form-control" id="password" name="password" required="" type="password">
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>
                                                        {{ $errors->first('password') }}
                                                    </strong>
                                                </span>
                                                @endif
                                            </input>
                                        </div>
                                    </div>                                
                            </div>
                            <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit">
                                                Entrar
                                        </button>
                            </div>
{{ Form::close() }}
                        </div>
                    </div>
        </div>
    </div>
        <script src="{{asset('/js/jquery-2.1.4.min.js')}}">
        </script>

</div>
<style>
.tableefecto{
  box-shadow: 1px 1px 20px #000;
}
</style>
@endsection





