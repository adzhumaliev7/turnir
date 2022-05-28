@extends('layouts.app')
@section('title', 'Подтверждение')
@section('content')

<div class="container">
@if(session()->has('message'))
    <p class="alert alert-info">
        {{ session()->get('message') }}
    </p>
@endif
<form method="POST" action="{{ route('verify.store') }}">
    {{ csrf_field() }}
    <h1> Двухэтапная верификация</h1>
    <p class="text-muted">
      Двухэтапная верификация
      Если вы не получили его, нажмите <a href="{{ route('verify.resend') }}">здесь</a>.
    </p>
    <div class="input-group mb-3">
      
        <input name="two_factor_code" type="text" 
            class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" 
            required autofocus placeholder="Two Factor Code">
        @if($errors->has('two_factor_code'))
            <div class="invalid-feedback">
                {{ $errors->first('two_factor_code') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-6">
            <button type="submit" class="btn btn-primary px-4">
                Подтвердить
            </button>
        </div>
    </div>
</form>
</div>
@endsection
