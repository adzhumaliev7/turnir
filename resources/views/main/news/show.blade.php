@extends('layouts.layout')
@section('title', 'Новости')
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
  <div class="container">

 
  <div class="info-help">
					<div>
						
						<p class="help__title" style="margin-top:35px;">Новая версия PUBG MOBILE</p>
						<p class="help__text info-help__text">
						{!!$post->text!!}
						</p>
					</div>
                    <div class=" d-flex" style="float: right;">
							<div class="help__avatar d-flex">
								
								<p class="help__avatar__p">  {{$post->admin->name}}</p>
							</div>
							<p class="help__avatar__time">{{Carbon\Carbon::parse($post->date)->format('d-m-Y')}}</p>
						</div>
				
	</div>
  </div>
</div>

    @endsection