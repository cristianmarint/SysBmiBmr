{{--  
Cristian Marin  October 17,2020
Github.com/CristianMarinT
  --}}
@extends('layouts.app')
@section('title','Registro')
@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear cuenta</h1>
              </div>
              <form class="user"method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input id="name" type="text" placeholder="Nombre completo" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <input id="email" type="email" placeholder="Email" class="form-control form-control-user" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" placeholder="Contraseña" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input id="password-confirm" placeholder="Repetir contraseña" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Registrarse') }}
                </button>
              </form>
              <hr>
              <div class="text-center">
                @if (Route::has('password.request'))
                  <a class="small" href="{{ route('password.request') }}">¿Olvido su contraseña?</a>
                @endif
              </div>
              <div class="text-center">
                @if (Route::has('register'))
                  <a class="small" href="{{ route('register') }}">Cree una cuenta</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
