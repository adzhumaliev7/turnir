 
 
 


@extends('layout')
@section('title', 'Турниры')
@section('content')


  <div class="header-pubg__bg-2">
    <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">

      <div class="dropdown">
        <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          tima@test.com
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>
          <li><a class="dropdown-item header__txt text-dark" href="logout">выйти</a></li>
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
              <a class="nav-link nav-white pubg-hover" aria-current="page" href="">Рейтинг</a>
            </li>
            <li class="nav-item nav-item--active ">
              <a class=" nav-link nav-white pubg-hover" aria-current="page" href="#">Помощь</a>
            </li>
          </ul>
        </div>
      </div>
  </nav>
</div>


<!-- ! разобраться с фото position absolute что бы фото было взаде текста -->
    <section>

        <!-- first item - 1 -->
        <div class="container">

           

            <div class="row d-flex justify-content-between">
                <div class="col-lg-6 my-3">
                    <div class="pubg pubg-3">
                    @if($tournaments != "")
                      @foreach($tournaments as $tournament)
                        <div class="pubg-img pubg-wrapper pubg-img-3">
                            <div class="pubg-block">
                                <h4 class="pubg__title pubg__title--margin">{{$tournament->name}}</h4>
                                <p class="pubg__text">{{$tournament->tournament_start}} {{$tournament->games_time}} {{$tournament->country}}</p>
                                <span class="pubg__price">Призовой фонд: {{$tournament->price}}</span>
                                <p class="pubg__text">Режим проведения: squad(4)</p>
                              
                                <a href="{{ route('match', $tournament->id) }}" class="pubg__btn pubg__btn--margin">Принять участие</a>
                            </div>
                        </div>
                          @endforeach
                 @else
                 <h4> Турниров нет</h4>
                 @endif
                    </div>
                </div>
            </div>
            
        </div>
    </section>

@endsection