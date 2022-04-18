@extends('layouts.layout')
@section('title', 'Турниры')
@section('content')


<div class="header-pubg__bg-2">

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
            </div>
            <span class="size_16">{{$tournaments->links()}}</span>
            @else
      <h4> Турниров нет</h4>
      @endif
        </div>
  </div>



@endsection