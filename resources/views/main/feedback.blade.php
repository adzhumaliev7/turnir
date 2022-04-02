@extends('layouts.layout')
@section('title', 'Обратная связь')
@section('content')

<div class="header-pubg__bg-2">
  <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">

    <div class="dropdown">
      @if($mail != null)
      <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{$mail}}
      </button>
      @else
      <a href="{{'login'}}" class="header__line header__txt " type="button">
        Войти
      </a>
      <a href="{{'registration'}}" class="header__line header__txt " type="button">
        Регистрация
      </a>
      @endif
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>
        <li><a class="dropdown-item header__txt text-dark" href="{{route('user.logout')}}">выйти</a></li>
      </ul>
    </div>
  </div>
  @include('main.inc.nav_header')
</div>

<div class="main">
  <!-- first item - 1 -->
  <div class="container">

    <!-- first item - 1 -->
    <div class="container">
      @if(Session::has('flash_meassage'))
      <div class="alert alert-success">{{Session::get('flash_meassage')}}</div>
      @endif
      <form method="POST" action="{{route('save_feedback')}}" enctype="multipart/form-data">
        @csrf
        <h2 class="title letter-spacing--none my-2"> ФИО </h2>
        <div class="col-lg-6">

          <input name="fio" placeholder="ФИО" type="text" class="form-control input__profile subtitle fw-normal" id="">
          @error('fio')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h2 class="title letter-spacing--none my-2"> Телефон </h2>
        <div class="col-lg-6">

          <input name="phone" placeholder="Телефон" type="text" class="form-control input__profile subtitle fw-normal" id="">
          @error('phone')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h2 class="title letter-spacing--none my-2"> Почта </h2>
        <div class="col-lg-6">

          <input name="email" placeholder="email" type="text" class="form-control input__profile subtitle fw-normal" id="">
          @error('email')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h2 class="title letter-spacing--none my-2"> Сообщение </h2>
        <div class="col-lg-6">

          <textarea name="description" placeholder="description" class="form-control input__profile subtitle fw-normal" id=""></textarea>
          @error('emdescriptionail')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>



        <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Отправить</button>
      </form>

    </div>
  </div>
</div>

    @endsection