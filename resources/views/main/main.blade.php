@extends('layouts.layout')
@section('title', 'Главная')
@section('content')
@if (session()->has('message'))
     <div class="container"> <div class="alert alert-info" style="font-size:16px;">{{ session('message') }}
     <a type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right; text-decoration:none; font-size:22px;">
            <span aria-hidden="true">&times;</span>  </a>
    </div></div>
      @endif
<header>
<div class="header-bg header header--person">
        <div class="header-pubg__bg-2">
            <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">
                <div class="dropdown">
                    @if($mail != null)
                    <button class=" header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{$mail}}
                    </button>
                    @else
                    <a href="{{'login'}}" class="header__txt " type="button">
                        Войти
                    </a>
                    <a href="{{'registration'}}" class=" header__txt " type="button">
                        Регистрация
                    </a>
                    @endif
                
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class= "  dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>
                        <li><a class="  dropdown-item header__txt text-dark" href="{{route('user.logout')}}">выйти</a></li>
                    </ul>
                </div>
            </div>
        
            @include('main.inc.nav_header')
            </nav>
        </div>
        <div class="container header-container">
            <h1 class="header__slogan slogan slogan--line">Регистрируйся и побеждай!</h1>
            <p class="header__txt subtitle header__txt--color header__txt--margin">Ежедневные турниры с денежными призами</p>
            <a class="header__btn btn pubg__btn" href="{{route('tournament')}}">Играть</a>

        
        </div>
        <!-- social icons -->
        <div class="social social-block">
            <div class="social-flex">

                <div class="social__block">

                    <div class="social__item">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>

                    <div class="social__item">
                        <a href="#"><i class="fab fa-telegram"></i></a>
                    </div>

                    <div class="social__item">
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>

                    <div class="social__item">
                        <a href="#"><i class="fab fa-discord"></i></a>
                    </div>
                </div>

            </div>
        
        </div>
        
    </div>
</header>
<!-- ! разобраться с фото position absolute что бы фото было взаде текста -->
<section>

    <!-- first item - 1 -->
    <div class="container">

        <div class="row d-flex justify-content-between">
            <div class="col-lg-6 my-3">
                <div class="pubg">
                    <div class="pubg-img pubg-wrapper">
                        <div class="pubg-block">
                            <h4 class="pubg__title pubg__title--margin">Fastcup daily</h4>
                            <p class="pubg__text">24.09.20021 22:00 Nur-Sultan</p>
                            <span class="pubg__text">Призовой фонд: 100$</span>
                            <p class="pubg__text pubg__text--margin">Режим проведения: squad(4)</p>
                            <a href="{{route('tournament')}}" class="pubg__btn">Принять участие</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 my-3">
                <div class="pubg pubg-2">
                    <div class="pubg-img pubg-wrapper pubg-img-2">
                        <div class="pubg-block">
                            <h4 class="pubg__title pubg__title--margin">Fastcup daily</h4>
                            <p class="pubg__text">24.09.20021 22:00 Nur-Sultan</p>
                            <span class="pubg__text">Призовой фонд: 100$</span>
                            <p class="pubg__text pubg__text--margin">Режим проведения: squad(4)</p>
                            <a href="{{route('tournament')}}" class="pubg__btn">Принять участие</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-between">
            <div class="col-lg-6 my-3">
                <div class="pubg pubg-3">
                    <div class="pubg-img pubg-wrapper pubg-img-3">
                        <div class="pubg-block">
                            <h4 class="pubg__title pubg__title--margin">Fastcup daily</h4>
                            <p class="pubg__text">24.09.20021 22:00 Nur-Sultan</p>
                            <span class="pubg__text">Призовой фонд: 100$</span>
                            <p class="pubg__text pubg__text--margin">Режим проведения: squad(4)</p>
                            <a href="{{route('tournament')}}" class="pubg__btn ">Принять участие</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 my-3">
                <div class="pubg pubg-4">
                    <div class="pubg-img pubg-wrapper pubg-img-4">
                        <div class="pubg-block">
                            <h4 class="pubg__title pubg__title--margin">Fastcup daily</h4>
                            <p class="pubg__text">24.09.20021 22:00 Nur-Sultan</p>
                            <span class="pubg__text">Призовой фонд: 100$</span>
                            <p class="pubg__text pubg__text--margin">Режим проведения: squad(4)</p>
                            <a href="{{route('tournament')}}" class="pubg__btn">Принять участие</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection