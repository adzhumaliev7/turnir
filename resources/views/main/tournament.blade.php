@extends('layouts.layout')
@section('title', 'Турниры')
@section('content')


<div class="header-pubg__bg-2">
  <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">

    <div class="dropdown">
      @if($mail != null)
      <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{$mail->email}}
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
  <nav class=" navbar navbar-expand-md navbar p-3 mb-5 bg-body rounded bg--none navbar-z">
    <div class=" container-fluid header-indent">
      <a class="navbar-brand title text-uppercase logo-indent-mr text-white pubg-hover px-2" href="{{route('main')}}">showmatch</a>
      <button class="toggle-menu toggle-click button--none">
        <span></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav w-100 justify-content-end">
          <li class="nav-item nav-item--active">
            <a class="nav__link-active nav-link nav-white pubg-hover" aria-current="page" href="{{route('tournament')}}">Турниры</a>
          </li>

          <li class="nav-item nav-item--active">
            <a class="nav-link nav-white pubg-hover" aria-current="page" href="{{route('rating')}}">Рейтинг</a>
          </li>

          <li class="nav-item nav-item--active ">
            <a class=" nav-link nav-white pubg-hover" aria-current="page" href="#">Помощь</a>
          </li>
          <li class="nav-item nav-item--active ">
            <a class=" nav-link nav-white pubg-hover" aria-current="page" href="{{route('feedback')}}">Обратная связь</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<!-- ! разобратся с фото position absolute что бы фото было взаде текста -->
  <div class="main">
    <!-- first item - 1 -->
    <div class="container">



      <div class="row d-flex justify-content-between">
        @if($tournaments != "")
        @foreach($tournaments as $tournament)
        <div class="col-lg-6 my-3">
          <div class="pubg pubg-3">

            <div class=" pubg-wrapper " style=" width: 100%;
                                                          background-image: url("../img/background/item-3.png");
                                                          background-repeat: no-repeat;
                                                          background-size: cover;
                                                          background-position: center;
                                                          border-radius: 2rem;">
              <div class="pubg-block">
                <h4 class="pubg__title pubg__title--margin">{{$tournament->name}}</h4>
                <p class="pubg__text">{{$tournament->tournament_start}} {{$tournament->games_time}} {{$tournament->country}}</p>
                <span class="pubg__price">Призовой фонд: {{$tournament->price}}</span>
                <p class="pubg__text pubg__text--margin">Режим проведения: squad(4)</p>
                <a href="{{ route('match', $tournament->id) }}" class="pubg__btn pubg__text--margin">Принять участие</a>
              </div>
            </div>

          </div>
        </div>
        @endforeach
        @else
        <h4> Турниров нет</h4>
        @endif
      </div>

    </div>
  </div>


@endsection