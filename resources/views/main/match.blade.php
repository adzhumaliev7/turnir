@extends('layouts.layout')
@section('title', 'Турнир')
@section('content')
<header>
  <div class="profile-bg  header--pb header margin--none">
    <div class="header-pubg__bg-2">
      <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">

        <div class="dropdown">
          <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{$mail->email}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>
            <li><a class="dropdown-item header__txt text-dark" href="logout">выйти</a></li>
          </ul>
        </div>
      </div>
      <nav class=" navbar navbar-expand-md navbar p-3 bg-body rounded bg--none navbar-z">
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
                <a class="nav-link nav-white pubg-hover" aria-current="page" href="rating.html">Рейтинг</a>
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
    <div class="container header-container">
      <div class="header-sz">
        <div class="header__panel d-flex justify-content-center align-items-center flex-sm-nowrap flex-wrap">
          <div class="header__profile">
            <img src="http://placehold.it/200" alt="profile" />
          </div>
          @foreach($tournaments as $tournament)
          <div class="header__nick">

            <h1 class="title text-capitalize font-sz text--responsive text-light">
              {{$tournament->name}}
            </h1>
            <p class="subtitle subtitle--gray text--responsive">
              {{$tournament->tournament_start}} {{$tournament->games_time}}
            </p>
            <p class="subtitle text--responsive text-light">{{$tournament->tournament_start}} {{$tournament->games_time}}</p>
            <p class="subtitle text--responsive text-light">Призовой фонд: {{$tournament->price}}</p>

            <p class="subtitle text--responsive text-light">Карта: </p>
            <p class="subtitle text--responsive text-light">Режим проведения: squad(4)</p>
            <p class="subtitle text--responsive text-light">Вид: от третьего лица</p>
            <p class="subtitle text--responsive text-light">Регистрация с {{$tournament->start_reg}} по {{$tournament->end_reg}}</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</header>
<main>
  <div class="profile__accordion">
    <div class="container">
      <nav>
        <div class="flex-wrap d-flex justify-content-start nav nav-tabs line--none flex-sm-nowrap" id="nav-tab" role="tablist">
          <button class="accordion__btn nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
            обзор
            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_107_89)">
                <path d="M9.99998 5.00001C9.63197 5.00576 9.26668 5.06422 8.91526 5.17362C9.07782 5.45949 9.16437 5.78227 9.16665 6.11112C9.16665 6.36647 9.11635 6.61931 9.01864 6.85522C8.92092 7.09114 8.77769 7.30549 8.59713 7.48605C8.41657 7.66661 8.20222 7.80983 7.96631 7.90755C7.7304 8.00527 7.47755 8.05556 7.2222 8.05556C6.89335 8.05328 6.57058 7.96673 6.2847 7.80417C6.05916 8.58639 6.08545 9.41975 6.35984 10.1862C6.63424 10.9527 7.14283 11.6133 7.81358 12.0747C8.48433 12.536 9.28323 12.7746 10.0971 12.7567C10.911 12.7388 11.6986 12.4652 12.3484 11.9748C12.9982 11.4843 13.4772 10.8019 13.7176 10.0241C13.9579 9.24631 13.9475 8.4126 13.6877 7.64107C13.4279 6.86954 12.932 6.19931 12.2701 5.7253C11.6083 5.2513 10.8141 4.99755 9.99998 5.00001ZM19.8791 8.38195C17.9962 4.70799 14.2684 2.22223 9.99998 2.22223C5.73158 2.22223 2.00276 4.70973 0.120814 8.3823C0.0413845 8.53942 0 8.71301 0 8.88907C0 9.06513 0.0413845 9.23872 0.120814 9.39584C2.0038 13.0698 5.73158 15.5556 9.99998 15.5556C14.2684 15.5556 17.9972 13.0681 19.8791 9.39549C19.9586 9.23837 20 9.06478 20 8.88872C20 8.71266 19.9586 8.53907 19.8791 8.38195ZM9.99998 13.8889C6.57463 13.8889 3.43436 11.9792 1.73852 8.8889C3.43436 5.79862 6.57429 3.8889 9.99998 3.8889C13.4257 3.8889 16.5656 5.79862 18.2614 8.8889C16.566 11.9792 13.4257 13.8889 9.99998 13.8889Z" fill="currentColor" />
              </g>
              <defs>
                <clipPath id="clip0_107_89">
                  <rect width="20" height="17.7778" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </button>
          <button class="accordion__btn nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
            Команды
            <svg width="20" height="16" viewBox="0 0 20 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 7C4.10313 7 5 6.10313 5 5C5 3.89687 4.10313 3 3 3C1.89688 3 1 3.89687 1 5C1 6.10313 1.89688 7 3 7ZM17 7C18.1031 7 19 6.10313 19 5C19 3.89687 18.1031 3 17 3C15.8969 3 15 3.89687 15 5C15 6.10313 15.8969 7 17 7ZM18 8H16C15.45 8 14.9531 8.22188 14.5906 8.58125C15.85 9.27188 16.7437 10.5188 16.9375 12H19C19.5531 12 20 11.5531 20 11V10C20 8.89687 19.1031 8 18 8ZM10 8C11.9344 8 13.5 6.43437 13.5 4.5C13.5 2.56562 11.9344 1 10 1C8.06563 1 6.5 2.56562 6.5 4.5C6.5 6.43437 8.06563 8 10 8ZM12.4 9H12.1406C11.4906 9.3125 10.7688 9.5 10 9.5C9.23125 9.5 8.5125 9.3125 7.85938 9H7.6C5.6125 9 4 10.6125 4 12.6V13.5C4 14.3281 4.67188 15 5.5 15H14.5C15.3281 15 16 14.3281 16 13.5V12.6C16 10.6125 14.3875 9 12.4 9ZM5.40938 8.58125C5.04688 8.22188 4.55 8 4 8H2C0.896875 8 0 8.89687 0 10V11C0 11.5531 0.446875 12 1 12H3.05938C3.25625 10.5188 4.15 9.27188 5.40938 8.58125Z" />
            </svg>
          </button>
          <button title="ИСПРАВИТЬ! ТИМА!" class="accordion__btn nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
            Правила
            <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sticky-note" class="svg-inline--fa fa-sticky-note fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path fill="currentColor" d="M312 320h136V56c0-13.3-10.7-24-24-24H24C10.7 32 0 42.7 0 56v400c0 13.3 10.7 24 24 24h264V344c0-13.2 10.8-24 24-24zm129 55l-98 98c-4.5 4.5-10.6 7-17 7h-6V352h128v6.1c0 6.3-2.5 12.4-7 16.9z"></path>
            </svg>
          </button>
          <button class="accordion__btn nav-link" id="nav-config-tab" data-bs-toggle="tab" data-bs-target="#nav-config" type="button" role="tab" aria-controls="nav-config" aria-selected="false">
            Сетка
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.0388 12.332L17.3747 11.3711C17.5427 10.4648 17.5427 9.53516 17.3747 8.62891L19.0388 7.66797C19.2302 7.5586 19.3162 7.33204 19.2537 7.1211C18.8201 5.73047 18.0818 4.47266 17.1169 3.42579C16.9685 3.26563 16.7263 3.22657 16.5388 3.33594L14.8747 4.29688C14.1755 3.69532 13.3708 3.23047 12.4997 2.92579V1.00782C12.4997 0.789068 12.3474 0.597662 12.1326 0.550787C10.699 0.230475 9.23022 0.2461 7.86694 0.550787C7.65209 0.597662 7.49975 0.789068 7.49975 1.00782V2.92969C6.63256 3.23829 5.82788 3.70313 5.12475 4.30079L3.46459 3.33985C3.27319 3.23047 3.03491 3.26563 2.88647 3.42969C1.92163 4.47266 1.18334 5.73047 0.749751 7.125C0.683345 7.33594 0.773188 7.5625 0.964594 7.67188L2.62866 8.63282C2.46069 9.53907 2.46069 10.4688 2.62866 11.375L0.964594 12.3359C0.773188 12.4453 0.687251 12.6719 0.749751 12.8828C1.18334 14.2734 1.92163 15.5313 2.88647 16.5781C3.03491 16.7383 3.27709 16.7773 3.46459 16.668L5.12866 15.707C5.82788 16.3086 6.63256 16.7734 7.50366 17.0781V19C7.50366 19.2188 7.656 19.4102 7.87084 19.457C9.30444 19.7773 10.7732 19.7617 12.1365 19.457C12.3513 19.4102 12.5037 19.2188 12.5037 19V17.0781C13.3708 16.7695 14.1755 16.3047 14.8787 15.707L16.5427 16.668C16.7341 16.7773 16.9724 16.7422 17.1208 16.5781C18.0857 15.5352 18.824 14.2773 19.2576 12.8828C19.3162 12.668 19.2302 12.4414 19.0388 12.332V12.332ZM9.99975 13.125C8.27709 13.125 6.87475 11.7227 6.87475 10C6.87475 8.27735 8.27709 6.875 9.99975 6.875C11.7224 6.875 13.1247 8.27735 13.1247 10C13.1247 11.7227 11.7224 13.125 9.99975 13.125Z" fill="currentColor" />
            </svg>
          </button>
        </div>
      </nav>
    </div>


    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content" style="font-size: 16px;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Выбрать участников</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="font-size: 16px;">
            <form method="POST" action="{{route('join', $tournament->id)}}">
              @csrf
              <select name="members[]" id="" multiple>
                @foreach($members as $member)
                <option value="{{$member->user_id}}">{{$member->login}}</option>
                @endforeach
              </select>
              <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
            </form>
          </div>
          <div class="modal-footer">


          </div>
        </div>
      </div>
    </div>

    <div class="tab-content tab-panels" id="nav-tabContent">
      <div class="tab-pane overflow-hidden fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <div class="container">

          <div class="row">
            <div class="col-lg">
              <p class="subtitle">{{$tournament->description}}</p>

            </div>
            <div class="col-lg-4">
              <form action="post">
                <div class="holding holding-block">
                  <p class="subtitle holding__title">Дата проведения</p>
                  <span class="subtitle subtitle--semi-medium">{{$tournament->tournament_start}}</span>
                  <span class="subtitle subtitle--semi-medium d-block">{{$tournament->games_time}} {{$tournament->country}} {{$tournament->timezone}}</span>
                  <hr>
                  <p class="subtitle subtitle--semi-medium">до начала:</p>
                  <div class="holding__timer">
                    <div class="holding__wrapper">
                      <div class="holding__item holding__number" data-countdown="{{$tournament->tournament_start}}"></div>

                      <div></div>
                    </div>
                    <div class="holding__wrapper">

                    </div>
                  </div>
                  <hr>



                  <div class="block">
                    <svg class="config" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.5 0C2.90715 0 0 2.9074 0 6.5C0 10.0928 2.9074 13 6.5 13C10.0928 13 13 10.0926 13 6.5C13 2.90715 10.0926 0 6.5 0ZM6.5 11.9844C3.46854 11.9844 1.01562 9.53126 1.01562 6.5C1.01562 3.46854 3.46874 1.01562 6.5 1.01562C9.53146 1.01562 11.9844 3.46874 11.9844 6.5C11.9844 9.53146 9.53126 11.9844 6.5 11.9844Z" fill="black"></path>
                      <path d="M6.5 3.27222C6.21954 3.27222 5.99219 3.49956 5.99219 3.78003V7.05016C5.99219 7.33063 6.21954 7.55797 6.5 7.55797C6.78046 7.55797 7.00781 7.33063 7.00781 7.05016V3.78003C7.00781 3.49956 6.78046 3.27222 6.5 3.27222Z" fill="black"></path>
                      <path d="M6.5 9.5509C6.87862 9.5509 7.18555 9.24397 7.18555 8.86536C7.18555 8.48674 6.87862 8.17981 6.5 8.17981C6.12138 8.17981 5.81445 8.48674 5.81445 8.86536C5.81445 9.24397 6.12138 9.5509 6.5 9.5509Z" fill="black"></path>
                    </svg>
                    <p class="subtitle subtitle--regular subtitle--inline-b">Условия для участия:</p>
                    <ul>
                      <li class="subtitle subtitle--regular">вы не получили условие 1</li>
                      <li class="subtitle subtitle--regular">вы не получили условие 2</li>
                      <li class="subtitle subtitle--regular">вы не получили условие 3</li>
                    </ul>
                  </div>
                  <details class="holding__accordion">

                    <summary class="subtitle subtitle--semi-medium">Команды</summary>

                    @if($teams != "")
                    @foreach($teams as $team)


                    <ul class="subtitle subtitle--list">
                      <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          @if($team->status == 'accepted')
                            <path d="M7.93126 3.75481C8.09911 3.92266 8.09911 4.19474 7.93126 4.3625L5.04866 7.24519C4.88081 7.41295 4.60882 7.41295 4.44097 7.24519L3.06874 5.87287C2.90089 5.70511 2.90089 5.43303 3.06874 5.26527C3.2365 5.09742 3.50858 5.09742 3.67635 5.26527L4.74477 6.33369L7.32357 3.75481C7.49142 3.58705 7.7635 3.58705 7.93126 3.75481ZM11 5.5C11 8.54012 8.5397 11 5.5 11C2.45988 11 0 8.5397 0 5.5C0 2.45988 2.4603 0 5.5 0C8.54012 0 11 2.4603 11 5.5ZM10.1406 5.5C10.1406 2.93488 8.06478 0.859375 5.5 0.859375C2.93488 0.859375 0.859375 2.93522 0.859375 5.5C0.859375 8.06512 2.93522 10.1406 5.5 10.1406C8.06512 10.1406 10.1406 8.06478 10.1406 5.5Z" fill="black"></path>
                          @else
                            <circle cx="5.5" cy="5.5" r="5" stroke="black"></circle>
                          @endif
                        </svg>
                        {{$team->name}}
                      </li>
                      <!-- <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.93126 3.75481C8.09911 3.92266 8.09911 4.19474 7.93126 4.3625L5.04866 7.24519C4.88081 7.41295 4.60882 7.41295 4.44097 7.24519L3.06874 5.87287C2.90089 5.70511 2.90089 5.43303 3.06874 5.26527C3.2365 5.09742 3.50858 5.09742 3.67635 5.26527L4.74477 6.33369L7.32357 3.75481C7.49142 3.58705 7.7635 3.58705 7.93126 3.75481ZM11 5.5C11 8.54012 8.5397 11 5.5 11C2.45988 11 0 8.5397 0 5.5C0 2.45988 2.4603 0 5.5 0C8.54012 0 11 2.4603 11 5.5ZM10.1406 5.5C10.1406 2.93488 8.06478 0.859375 5.5 0.859375C2.93488 0.859375 0.859375 2.93522 0.859375 5.5C0.859375 8.06512 2.93522 10.1406 5.5 10.1406C8.06512 10.1406 10.1406 8.06478 10.1406 5.5Z" fill="black"></path>
                                  </svg>
                                  участник 2</li>
                              <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="5.5" cy="5.5" r="5" stroke="black"></circle>
                                  </svg>
                                  участник 3</li>
                              <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="5.5" cy="5.5" r="5" stroke="black"></circle>
                                  </svg>
                                  участник 4</li>
                              <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M7.93126 3.75481C8.09911 3.92266 8.09911 4.19474 7.93126 4.3625L5.04866 7.24519C4.88081 7.41295 4.60882 7.41295 4.44097 7.24519L3.06874 5.87287C2.90089 5.70511 2.90089 5.43303 3.06874 5.26527C3.2365 5.09742 3.50858 5.09742 3.67635 5.26527L4.74477 6.33369L7.32357 3.75481C7.49142 3.58705 7.7635 3.58705 7.93126 3.75481ZM11 5.5C11 8.54012 8.5397 11 5.5 11C2.45988 11 0 8.5397 0 5.5C0 2.45988 2.4603 0 5.5 0C8.54012 0 11 2.4603 11 5.5ZM10.1406 5.5C10.1406 2.93488 8.06478 0.859375 5.5 0.859375C2.93488 0.859375 0.859375 2.93522 0.859375 5.5C0.859375 8.06512 2.93522 10.1406 5.5 10.1406C8.06512 10.1406 10.1406 8.06478 10.1406 5.5Z" fill="black"></path>
                                  </svg>
                                  участник 5</li> -->
                    </ul>
                    @endforeach
                    @else
                    <summary class="subtitle subtitle--semi-medium">Нет команд</summary>
                    @endif
                  </details>

                  @if($turnir == 'active')
                  @if($reg =='time')
                  @if($checked != NULL)
                  @if($checked == 'captain')
                  <div class="block-btn">

                    <a href="" class="submit-btn btn--size btn--orange btn--margin" data-toggle="modal" data-target="#exampleModalLong"> Принять участие</a>
                    <!--   <a href="{{route('join', $tournament->id)}}" class="submit-btn btn--size btn--orange btn--margin">Принять участие</a> -->
                  </div>
                  @elseif(($checked == 'member'))
                  <div class="block-btn">
                    <h3>Принять участие может только капитан команды</h3>
                  </div>
                  @elseif(($checked == 'has'))

                  @if($team->status == 'processed')
                  <div class="block-btn">
                    <h3>Ваша заявка на расмотреннии</h3>
                  </div>
                  @elseif($team->status == 'accepted')
                  <div class="block-btn">
                    <h3>Вы зарегистрированны</h3>
                  </div>
                  @elseif($team->status == 'not_accepted')
                  <div class="block-btn">
                    <h3>Ваша заявка отклонена</h3>

                  </div>
                  @endif

                  @endif
                  @else
                  <div class="block-btn">
                    <h3>У вас нет команды</h3>
                  </div>
                  @endif
                  @elseif($reg== 'dont_time')
                  <div class="block-btn">
                    <h3>Регистрация ещё не началась</h3>
                  </div>
                  @elseif($reg == 'loss')
                  <div class="block-btn">
                    <h3>Регистрация закончилась</h3>
                  </div>
                  @endif
                  @else
                  <div class="block-btn">
                    <h3>Турнир закончился</h3>
                  </div>
                  @endif
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
      @component('admin.shared.modal')
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

      </div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-config-tab">

      </div>
      <div class="tab-pane fade" id="nav-config" role="tabpanel" aria-labelledby="nav-config-tab">
        <div class="container">
          <span>Настройки успешно установленны!</span>
        </div>
      </div>
    </div>
  </div>
</main>
@endforeach

@endsection