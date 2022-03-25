@extends('layouts.app')
@section('title', 'Авторизация')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session()->has('message'))
      <div class="alert alert-info">{{ session('message') }}</div>
      @endif
      <div class="card">
        <div class="card-header">{{ __('Авторизация') }}</div>

        <div class="card-body">
          <form method="POST" action="{{route('user.login')}}">
            @csrf
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Адрес') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
         
            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Войти') }}
                </button>
                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                      @endif

              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection