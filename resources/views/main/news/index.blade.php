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

  <h1 class="help__h1">Новости</h1>

            @foreach($posts as $post)
				<div class="help d-flex">
					<div>
					
					</div>
					<div class="help__container">
						<p> 
							<a href="{{route('news.show', $post->id)}}" class="help__title"> 
								{{$post->title}}
							</a>
						</p>
						<div class=" d-flex">
							<div class="help__avatar d-flex">
								
								<p class="help__avatar__p">{{$post->name}}</p>
							</div>
							<p class="help__avatar__time">{{Carbon\Carbon::parse($post->date)->format('d-m-Y')}}</p>
						</div>
                        <a href="{{route('news.show', $post->id)}}" class="help__text_link"> 
						<p class="help__text">
                        <?php $string = strip_tags($post->text);
                        	    $string = substr($string, 0, 300);
	                            $string = rtrim($string, "!,.-");
                                $string = substr($string, 0, strrpos($string, ' '));
                                echo $string."… ";
                      ?>
                      
						</p>
                        </a>
					</div>
				</div>
			    @endforeach

  </div>
</div>

    @endsection