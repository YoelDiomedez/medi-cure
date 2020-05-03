@extends('layouts.auth')

@section('pagetitle', 'Iniciar Sesión')

@section('content')
<!-- BEGIN LOGIN FORM -->
<form method="POST" action="{{ route('login') }}">
    @csrf

    <h3 class="form-title font-dark">Iniciar Sesión</h3>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">{{ __('E-mail') }}</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block text-center bold"> {{ $errors->first('email') }} </span>
        @endif    
    </div>
    
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
    </div>

    <div class="form-actions text-center">
        <button type="submit" class="btn blue uppercase btn-block">Ingresar <i class="icon-login"></i></button>
    </div>
    <div class="create-account bg-dark">
        <p>
            <a href="{{ route('password.request') }}" id="forget-password" class="bg-font-dark">
                ¿Olvidate tu Contraseña?
            </a>
        </p>
    </div>
    
</form>
<!-- END LOGIN FORM -->
@endsection
