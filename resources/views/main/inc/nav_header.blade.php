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
              <li class="nav-item nav-item--active">
                <a class="nav-link nav-white pubg-hover" aria-current="page" href="{{route('rating')}}">Рейтинг</a>
              </li>
              <li class="nav-item nav-item--active ">
                <a class=" nav-link nav-white pubg-hover" aria-current="page" href="">Помощь</a>
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