{{-- 
    Cristian Marin  October 17,2020
    Github.com/CristianMarinT
--}}
 
@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">¿De nuevo por aqu&iacute;?</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control form-control-user @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Email">
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" placeholder="Contraseña" id="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label">Recuerdame</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
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

    </div>

  </div>
@endsection
