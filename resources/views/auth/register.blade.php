@extends('layouts.auth')

@section('content')
<!-- BEGIN REGISTRATION FORM -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    <h3 class="form-title font-dark">Registro</h3>
    
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Nombres') }}</label> 
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombres" required>
            @if ($errors->has('name'))
                <span class="help-block text-center bold"> {{ $errors->first('name') }} </span>   
            @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('E-Mail') }}</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" required>
            @if ($errors->has('email'))
                <span class="help-block text-center bold"> {{ $errors->first('email') }} </span>
            @endif
        </div>
        
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
            @if ($errors->has('password'))
                <span class="help-block text-center bold"> {{ $errors->first('password') }} </span>
            @endif
        </div>
        
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Confirmar Contraseña') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña"  required>
        </div>

    <div class="form-actions">
        <button type="submit" id="register-submit-btn" class="btn blue uppercase btn-block">
            {{ __('Registrase') }} <i class="icon-user-following "></i>
        </button>
    </div>
</form>
<!-- END REGISTRATION FORM -->
@endsection