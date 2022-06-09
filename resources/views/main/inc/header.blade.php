<div class="header-pubg__bg-2">
    <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">
        <div class="dropdown">
            @if(Auth::check())
			  @if($active != 1)
                    <a href="{{route('confirm_message')}}" class=" header__txt button--none " type="button">
                     Отправить сообщение для активации
                    </a>
                    @endif
                <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->email}}
                </button>
            @else
               
                    <nav class="nav" >
                <a href="{{route('user.login')}}" class="flex-sm-fill text-sm-center text-light nav-link" type="button">
                    Войти
                </a>
                <a href="{{route('user.registration')}}" class="text-light flex-sm-fill text-sm-center  nav-link    btn-dark" type="button">
                    Регистрация
                </a>
                </nav>
            @endif
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>

                <li><a  href="/public/profile?tab=nav-team-tab" class=" dropdown-item header__txt text-dark">команды</a></li>
                <li><a  href="/public/profile?tab=nav-tourney-tab" class=" dropdown-item header__txt text-dark">турниры</a></li>
                <li><a  href="/public/profile?tab=nav-config-tab" class=" dropdown-item header__txt text-dark">настройка</a></li>

                <li><a class="dropdown-item header__txt text-dark" href="{{route('user.logout')}}">выйти</a></li>
            </ul>
        </div>
    </div>
     <nav class="mobile-menu">
              <div class="mobile-menu__header">
                <a
                  class="mobile-menu__a"
                  href="{{route('main')}}">
                  bigplay
                </a>
              </div>
              <input type="checkbox" id="checkbox" class="mobile-menu__checkbox">
              <label for="checkbox" class="mobile-menu__btn">
                <div class="mobile-menu__icon">
                </div>
              </label>
              <div class="mobile-menu__container">
                <ul class="mobile-menu__list">
                  <li class="mobile-menu__item">
                    <a href="{{route('tournament')}}" class="mobile-menu__link">Турниры</a>
                  </li>

                  <li class="mobile-menu__item">
                    <a href="{{route('main.help')}}" class="mobile-menu__link">Помощь</a>
                  </li>
                  <li class="mobile-menu__item">
                    <a href="{{route('news')}}" class="mobile-menu__link">Новости</a>
                  </li>
                  <li class="mobile-menu__item">
                    <a href="{{route('feedback')}}" class="mobile-menu__link">Обратная связь</a>
                  </li>
                </ul>
              </div>
            </nav> 
    <nav class=" navbar navbar-expand-md navbar p-3 bg-body rounded bg--none navbar-z">
        <div class=" container-fluid header-indent">
            <a class="navbar-brand title text-uppercase logo-indent-mr text-dark pubg-hover px-2" href="{{route('main')}}">bigplay</a>
            <button class="toggle-menu toggle-click button--none">
                <span></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 justify-content-end">
                    <li class="nav-item nav-item--active">
                        <a class="nav__link-active nav-link nav-white pubg-hover" aria-current="page" href="{{route('tournament')}}">Турниры</a>
                    </li>

               

                    <li class="nav-item nav-item--active ">
                        <a class=" nav-link nav-white pubg-hover" aria-current="page" href="{{route('main.help')}}">Помощь</a>
                    </li>
                    



                    
                     <li class="nav-item nav-item--active ">
                         <a class=" nav-link nav-white pubg-hover" aria-current="page" href="{{route('news')}}">Новости</a>
                    </li>
                    <li class="nav-item nav-item--active ">
                        <a class=" nav-link nav-white pubg-hover" aria-current="page" href="{{route('feedback')}}">Обратная связь</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
