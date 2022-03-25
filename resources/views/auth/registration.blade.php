@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session()->has('message'))
      <div class="alert alert-info">{{ session('message') }}</div>
      @endif
      <div class="card">
        <div class="card-header">{{ __('Регистрация') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('user.registration') }}">
            @csrf

            <div class="row mb-3">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Логин') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail адрес') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>Такой email уже занят</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Страна') }}</label>

              <div class="col-md-6">
                <select name="country" id="country"  class="form-control @error('country') is-invalid @enderror"  autocomplete="new-country">
                <option value="">Выбрать страну</option>
                  @foreach($countries as $country)
    
                  <option value="{{$country}}">{{$country}}</option>
                  @endforeach
                </select>

                @error('country')
                <span class="invalid-feedback" role="alert">
                  <strong>Выберите страну</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторите пароль') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
            </div>
            <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
            {!! NoCaptcha::display() !!}
            @if ($errors->has('g-recaptcha-response'))
              <span class="help-block">
                  <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
              </span>
          @endif
          </div>
            </div>
            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Сохранить') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
{!! NoCaptcha::renderJs() !!}
@endpush