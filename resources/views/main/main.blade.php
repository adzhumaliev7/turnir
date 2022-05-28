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

    <div class="header-bg header ">
        <div class="container header-container">
            <h1 class="header__slogan slogan slogan--line">Регистрируйся и побеждай!</h1>
            <p class="header__txt subtitle header__txt--color header__txt--margin">Турниры с денежными призами</p>
            <a class="btn  submit-btn  mt-4" href="{{route('tournament')}}">Регистрация</a>

        
        </div>
        <!-- social icons -->
        <div class="social social-block">
            <div class="social-flex">

                <div class="social__block">

                    <div class="social__item">
                        <a href="https://www.instagram.com/bigplay.gg/"><i class="fab fa-instagram"></i></a>
                    </div>

                    <div class="social__item">
                        <a href="https://t.me/+3gpT2AO3-I03NTZi"><i class="fab fa-telegram"></i></a>
                    </div>

                  

                    <div class="social__item">
                        <a href="https://discord.gg/ASxHzZnxRJ"><i class="fab fa-discord"></i></a>
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
    @if($tournaments != null)
  <div class="top row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  @foreach($tournaments as $tournament)
  <div class="col">
              <div class="card shadow-sm">
              <div class="bg">
                    @if($tournament->file_label != null)
                    <img src="{{ asset("uploads/storage/adminimg/turnir_logo/$tournament->file_label")}}" class="bg-img" />
                    @else  
                    <img src="{{asset("img/bigplay.jpg")}}" class="bg-img" />
                    @endif
                  </div>
                    <div class="card-body">
                        
                    <h4 class="card-text__h4">{{$tournament->name}}</h4>
                    <h4 class="card-text__format">Начало турнира: {{Carbon\Carbon::parse($tournament->tournament_start)->format('d.m.Y')}}</h4>
                      <div class="card-text__format">
                        <p class="card-text__format">
                          Статус: 
                           @if($tournament->active == 1) 
                           @if($tournament->endDate($tournament->tournament_start))
                            Игра
                              @else
                                @if($tournament->endDate($tournament->start_reg))
                                 @if($tournament->endDate($tournament->end_reg))
                                   Регистрация завершена
                                  @else Регистрация   
                                  @endif   
                                  @else Регистрация еще не началась
                                @endif
                              @endif 
                            @else Завершен      
                          @endif  
                        </p>   
                        <p class="card-text__format">Призовой фонд: {{$tournament->price}}</p>
                        <p class="card-text__format">Формат: {{$tournament->format}}</p>  

                        @if($tournament->active == 1)
                           @if($tournament->endDate($tournament->tournament_start))
                          
                           <button onclick="document.location='{{route("match", $tournament->id)}}'" class="btn  submit-btn  mt-4"> Смотреть</button>
                         
                              @else
                                @if($tournament->endDate($tournament->start_reg) )
                                 @if($tournament->endDate($tournament->end_reg))
                                 <button onclick="document.location='{{route("match", $tournament->id)}}'" class="btn  submit-btn  mt-4"> Смотреть</button>
                                  @else
                                 <button onclick="document.location='{{route("match", $tournament->id)}}'" class="btn  submit-btn  mt-4"> Смотреть</button>
                                  @endif   
                                @else 
                                 <button onclick="document.location='{{route("match", $tournament->id)}}'" class="btn  submit-btn  mt-4"> Смотреть</button>
                                @endif
                              @endif 
                            @else 
                         
                                 <button onclick="document.location='{{route("match", $tournament->id)}}'" class="btn  submit-btn  mt-4"> Смотреть</button>
                                  
                          @endif  
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
</section>

@endsection