


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

        <div class="header-pubg__bg-2">

            @include('main.inc.nav_header')
            </nav>
        </div>
</header>
    <div class="header-bg header header--person">
        <div class="container header-container">
            <h1 class="header__slogan slogan slogan--line">Регистрируйся и побеждай!</h1>
            <p class="header__txt subtitle header__txt--color header__txt--margin">Ежедневные турниры с денежными призами</p>
            <a class="btn  submit-btn  mt-4" href="{{route('tournament')}}">Играть</a>
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
    

<!-- ! разобраться с фото position absolute что бы фото было взаде текста -->
<section>

    <!-- first item - 1 -->
    <div class="container">

  <div class="top row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
              <div class="bg">
                   
                 
                    <img src="{{asset("img/logo2.jpg")}}" class="bg-img" />
                 
                  </div>
                    <div class="card-body">
                        
                    <h4 class="card-text__h4">FastCup 2021: PUBG Mobile #1</h4>
                      <div class="card-text__format">
                        <p class="card-text__format">
                             Статус:
                 
                       Игра
                  
                        </p>   
                        <p class="card-text__format">Призовой фонд: 200$</p>
                        <p class="card-text__format">Формат: Squad</p>  
                       
                        <button onclick="document.location='{{route("tournament")}}'" class="btn  submit-btn  mt-4"> Смотреть</button>
                      </div>
                    </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
              <div class="bg">

                    <img src="{{asset("img/bigplay.jpg")}}" class="bg-img" />
                 
                  </div>
                    <div class="card-body">
                        
                    <h4 class="card-text__h4">FastCup 2021: PUBG Mobile #2</h4>
                      <div class="card-text__format">
                        <p class="card-text__format">
                             Статус:
                 
                       Игра

                        </p>   
                        <p class="card-text__format">Призовой фонд: 500$</p>
                        <p class="card-text__format">Формат: Squad</p>  
                       
                        <button onclick="document.location='{{route("tournament")}}'" class="btn  submit-btn  mt-4"> Смотреть</button>
                      </div>
                    </div>
              </div>
            </div>
            <div class="col">
              <div class="card shadow-sm">
              <div class="bg">
                   
                 
                    <img src="{{asset("img/logo3.jpg")}}" class="bg-img" />
                 
                  </div>
                    <div class="card-body">
                        
                    <h4 class="card-text__h4">FastCup 2021: PUBG Mobile #3</h4>
                      <div class="card-text__format">
                        <p class="card-text__format">
                             Статус:
                       Игра
                  
                        </p>   
                        <p class="card-text__format">Призовой фонд: 100$ </p>
                        <p class="card-text__format">Формат: Squad</p>  
                       
                        <button onclick="document.location='{{route("tournament")}}'" class="btn  submit-btn  mt-4"> Смотреть</button>
                      </div>
                    </div>
              </div>
            </div>

            </div>
    </div>
</section>

@endsection