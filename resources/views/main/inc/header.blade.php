<div class="header-pubg__bg-2">
    <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">
        <div class="dropdown">
            @if(Auth::check())
                <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->email}}
                </button>
            @else
                <a href="{{route('user.login')}}" class="header__line header__txt " type="button">
                    Войти
                </a>
                <a href="{{route('user.registration')}}" class="header__line header__txt " type="button">
                    Регистрация
                </a>
            @endif
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>
                <li><a class="dropdown-item header__txt text-dark" href="{{route('user.logout')}}">выйти</a></li>
            </ul>
        </div>
    </div>
    <nav class=" navbar navbar-expand-md navbar p-3 bg-body rounded bg--none navbar-z">
        <div class=" container-fluid header-indent">
            <a class="navbar-brand title text-uppercase logo-indent-mr text-white pubg-hover px-2" href="{{route('main')}}">bigplay</a>
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
