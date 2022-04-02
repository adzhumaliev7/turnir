@extends('layouts.layout')
@section('title', 'Турниры')
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
  @if($tournaments != null)
  <div class="top row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

  @foreach($tournaments as $tournament)
            <div class="col">
              <div class="card shadow-sm">
              <div class="bg">
                   
                    <img src="{{asset("img/background/item-3.png")}}" class="bg-img" alt="bg" />
                  </div>
                    <div class="card-body">
                        
                    <h4 class="card-text__h4">{{$tournament->name}}</h4>
                      <div class="card-text">
                        <p class="card-text__game">
                             
               @if(strtotime($date) > strtotime($tournament->end_reg)   && $tournament->active == 1)
                  Игра
                @elseif(strtotime($date) >= strtotime($tournament->start_reg) && strtotime($date) <= strtotime($tournament->end_reg)  && $tournament->active == 1 )
                Регистрация
                @else Завершен
               @endif     

                        </p>
                     
                        <p class="card-text__prize">Призовой фонд: {{$tournament->price}}</p>
                        <p class="card-text__format">Формат: {{$tournament->format}}</p>  


                        @if(strtotime($date) > strtotime($tournament->end_reg)   && $tournament->active == 1)
                        <button onclick="document.location='{{route("match", $tournament->id)}}'" class="card-btn"> Смотреть</button>
                @elseif(strtotime($date) >= strtotime($tournament->start_reg) && strtotime($date) <= strtotime($tournament->end_reg)  && $tournament->active == 1)
                <button onclick="document.location='{{route("match", $tournament->id)}}'" class="card-btn"> Принять участие</button>
                @else   <button onclick="document.location='{{route("match", $tournament->id)}}'" class="card-btn"> Смотреть</button>
               @endif

                      </div>
                    </div>
              </div>
            </div>
            @endforeach
          
    
            </div>
            <span style="font-size:16px;">{{$tournaments->links()}}</span>
            @else
      <h4> Турниров нет</h4>
      @endif
        </div>
  </div>



@endsection