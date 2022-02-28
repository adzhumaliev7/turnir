@extends('layouts.layout')
@section('title', 'Профиль')
@section('content')

<header>
  <div class="profile-bg h-100 header--pb header margin--none">
    <div class="header-pubg__bg-2">
      <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">

        <div class="dropdown">
          <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{$mail}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>
            <li><a class="dropdown-item header__txt text-dark" href="{{route('user.logout')}}">выйти</a></li>
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
                <a class="nav-link nav-white pubg-hover" aria-current="page" href="{{route('rating')}}">Рейтинг</a>
              </li>
              <li class="nav-item nav-item--active ">
                <a class=" nav-link nav-white pubg-hover" aria-current="page" href="">Помощь</a>
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
            @if($user_photo != NULL)
            <img class="header__img" src="{{ asset("uploads/storage/img/userslogo/$user_photo")}}" width="150" height="150" alt="" alt="profile" />
            @else
            <img class="header__img" src="http://placehold.it/150" alt="profile" />
            <form action="{{route('save_photo')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="file" class="form-control input__profile subtitle fw-normal" id="fileInput" name="logo">

              <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
            </form>
            @endif
          </div>
          <div class="header__nick">
            @if(!$data==NULL)
            @foreach($data['data'] as $dat)
            <h1 class="title  text-capitalize font-sz text--responsive" style=" color: white;">{{$user_name}}</h1>
            <sub class="subtitle subtitle--gray text--responsive"><? if ($dat->verification == 'verified') {
                                                                    echo "Верифицирован";
                                                                  } else {
                                                                    echo "Не верифицирован";
                                                                  } ?></sub>
            <sub class="subtitle subtitle--gray text--responsive"><? if ($active == 1) {
                                                                    echo "Активирован";
                                                                  } else {
                                                                    echo "Не Активирован";
                                                                  } ?></sub>
            @endforeach
            @else
            <h1 class="title text-capitalize font-sz" style="color: white;">{{$user_name}}</h1>
            <sub class="subtitle subtitle--gray text--responsive">Не верифицирован</sub>
            <sub class="subtitle subtitle--gray text--responsive"><? if ($active == 1) {
                                                                    echo "Активирован";
                                                                  } else {
                                                                    echo "Не Активирован";
                                                                  } ?></sub>
            @endif
            <p class="subtitle text--responsive text-light">

            </p>
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
                <path d="M9.99998 5.00001C9.63197 5.00576 9.26668 5.06422 8.91526 5.17362C9.07782 5.45949 9.16437 5.78227 9.16665 6.11112C9.16665 6.36647 9.11635 6.61931 9.01864 6.85522C8.92092 7.09114 8.77769 7.30549 8.59713 7.48605C8.41657 7.66661 8.20222 7.80983 7.96631 7.90755C7.7304 8.00527 7.47755 8.05556 7.2222 8.05556C6.89335 8.05328 6.57058 7.96673 6.2847 7.80417C6.05916 8.58639 6.08545 9.41975 6.35984 10.1862C6.63424 10.9527 7.14283 11.6133 7.81358 12.0747C8.48433 12.536 9.28323 12.7746 10.0971 12.7567C10.911 12.7388 11.6986 12.4652 12.3484 11.9748C12.9982 11.4843 13.4772 10.8019 13.7176 10.0241C13.9579 9.24631 13.9475 8.4126 13.6877 7.64107C13.4279 6.86954 12.932 6.19931 12.2701 5.7253C11.6083 5.2513 10.8141 4.99755 9.99998 5.00001ZM19.8791 8.38195C17.9962 4.70799 14.2684 2.22223 9.99998 2.22223C5.73158 2.22223 2.00276 4.70973 0.120814 8.3823C0.0413845 8.53942 0 8.71301 0 8.88907C0 9.06513 0.0413845 9.23872 0.120814 9.39584C2.0038 13.0698 5.73158 15.5556 9.99998 15.5556C14.2684 15.5556 17.9972 13.0681 19.8791 9.39549C19.9586 9.23837 20 9.06478 20 8.88872C20 8.71266 19.9586 8.53907 19.8791 8.38195ZM9.99998 13.8889C6.57463 13.8889 3.43436 11.9792 1.73852 8.8889C3.43436 5.79862 6.57429 3.8889 9.99998 3.8889C13.4257 3.8889 16.5656 5.79862 18.2614 8.8889C16.566 11.9792 13.4257 13.8889 9.99998 13.8889Z" fill="black" />
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
            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 7C4.10313 7 5 6.10313 5 5C5 3.89687 4.10313 3 3 3C1.89688 3 1 3.89687 1 5C1 6.10313 1.89688 7 3 7ZM17 7C18.1031 7 19 6.10313 19 5C19 3.89687 18.1031 3 17 3C15.8969 3 15 3.89687 15 5C15 6.10313 15.8969 7 17 7ZM18 8H16C15.45 8 14.9531 8.22188 14.5906 8.58125C15.85 9.27188 16.7437 10.5188 16.9375 12H19C19.5531 12 20 11.5531 20 11V10C20 8.89687 19.1031 8 18 8ZM10 8C11.9344 8 13.5 6.43437 13.5 4.5C13.5 2.56562 11.9344 1 10 1C8.06563 1 6.5 2.56562 6.5 4.5C6.5 6.43437 8.06563 8 10 8ZM12.4 9H12.1406C11.4906 9.3125 10.7688 9.5 10 9.5C9.23125 9.5 8.5125 9.3125 7.85938 9H7.6C5.6125 9 4 10.6125 4 12.6V13.5C4 14.3281 4.67188 15 5.5 15H14.5C15.3281 15 16 14.3281 16 13.5V12.6C16 10.6125 14.3875 9 12.4 9ZM5.40938 8.58125C5.04688 8.22188 4.55 8 4 8H2C0.896875 8 0 8.89687 0 10V11C0 11.5531 0.446875 12 1 12H3.05938C3.25625 10.5188 4.15 9.27188 5.40938 8.58125Z" fill="black" />
            </svg>
          </button>
          <button title="" class="accordion__btn nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
            Турниры
            <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trophy" class="svg-inline--fa fa-trophy fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path fill="" d="M552 64H448V24c0-13.3-10.7-24-24-24H152c-13.3 0-24 10.7-24 24v40H24C10.7 64 0 74.7 0 88v56c0 35.7 22.5 72.4 61.9 100.7 31.5 22.7 69.8 37.1 110 41.7C203.3 338.5 240 360 240 360v72h-48c-35.3 0-64 20.7-64 56v12c0 6.6 5.4 12 12 12h296c6.6 0 12-5.4 12-12v-12c0-35.3-28.7-56-64-56h-48v-72s36.7-21.5 68.1-73.6c40.3-4.6 78.6-19 110-41.7 39.3-28.3 61.9-65 61.9-100.7V88c0-13.3-10.7-24-24-24zM99.3 192.8C74.9 175.2 64 155.6 64 144v-16h64.2c1 32.6 5.8 61.2 12.8 86.2-15.1-5.2-29.2-12.4-41.7-21.4zM512 144c0 16.1-17.7 36.1-35.3 48.8-12.5 9-26.7 16.2-41.8 21.4 7-25 11.8-53.6 12.8-86.2H512v16z"></path>
            </svg>
          </button>
          <button class="accordion__btn nav-link" id="nav-config-tab" data-bs-toggle="tab" data-bs-target="#nav-config" type="button" role="tab" aria-controls="nav-config" aria-selected="false">
            Настройка
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.0388 12.332L17.3747 11.3711C17.5427 10.4648 17.5427 9.53516 17.3747 8.62891L19.0388 7.66797C19.2302 7.5586 19.3162 7.33204 19.2537 7.1211C18.8201 5.73047 18.0818 4.47266 17.1169 3.42579C16.9685 3.26563 16.7263 3.22657 16.5388 3.33594L14.8747 4.29688C14.1755 3.69532 13.3708 3.23047 12.4997 2.92579V1.00782C12.4997 0.789068 12.3474 0.597662 12.1326 0.550787C10.699 0.230475 9.23022 0.2461 7.86694 0.550787C7.65209 0.597662 7.49975 0.789068 7.49975 1.00782V2.92969C6.63256 3.23829 5.82788 3.70313 5.12475 4.30079L3.46459 3.33985C3.27319 3.23047 3.03491 3.26563 2.88647 3.42969C1.92163 4.47266 1.18334 5.73047 0.749751 7.125C0.683345 7.33594 0.773188 7.5625 0.964594 7.67188L2.62866 8.63282C2.46069 9.53907 2.46069 10.4688 2.62866 11.375L0.964594 12.3359C0.773188 12.4453 0.687251 12.6719 0.749751 12.8828C1.18334 14.2734 1.92163 15.5313 2.88647 16.5781C3.03491 16.7383 3.27709 16.7773 3.46459 16.668L5.12866 15.707C5.82788 16.3086 6.63256 16.7734 7.50366 17.0781V19C7.50366 19.2188 7.656 19.4102 7.87084 19.457C9.30444 19.7773 10.7732 19.7617 12.1365 19.457C12.3513 19.4102 12.5037 19.2188 12.5037 19V17.0781C13.3708 16.7695 14.1755 16.3047 14.8787 15.707L16.5427 16.668C16.7341 16.7773 16.9724 16.7422 17.1208 16.5781C18.0857 15.5352 18.824 14.2773 19.2576 12.8828C19.3162 12.668 19.2302 12.4414 19.0388 12.332V12.332ZM9.99975 13.125C8.27709 13.125 6.87475 11.7227 6.87475 10C6.87475 8.27735 8.27709 6.875 9.99975 6.875C11.7224 6.875 13.1247 8.27735 13.1247 10C13.1247 11.7227 11.7224 13.125 9.99975 13.125Z" fill="black" />
            </svg>
          </button>
        </div>
      </nav>
    </div>
    <div class="tab-content tab-panels" id="nav-tabContent">
    @error('text')
                <div class="alert alert-danger" style="font-size: 16px;">Введите текст сообщения</div>
                @enderror
      @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
      @endif
      @if(Session::has('flash_meassage'))
      <div class="alert alert-success">{{Session::get('flash_meassage')}}</div>
      @endif
      <div class="tab-pane overflow-hidden fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="container">

          @if($data != NULL )

          @foreach($data['data'] as $dat)
          <? if ($dat->verification == 'verified') {

            $h4 = 'Аккаунт верифицирован';
          } elseif ($dat->verification == 'on_check') {

            $h4 = 'Аккаунт на проверке';
          } elseif ($dat->verification == 'rejected') {

            $h4 = 'Вернут на доработку';
          } else {

            $h4 = 'Пройти верификацию';
          }
          ?>
          @endforeach
          @else
          <?

          $h4 = 'Аккаунт не верифицирован';
          ?>
          @endif
        
          @if($data != NULL)
          <? if ($data['status'] == 0)
            $disabled = 'disabled';
          else
            $disabled = '';
          ?>
           @include('main.profile.update_profile')
          @else
           @include('main.profile.create_profile')
          @endif
        </div>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="container">
          <span class="title letter-spacing--none">Мои команды</span>
          @if($teams)
          @foreach($teams as $team)
          <div class="row">
        
            <div class="col d-flex justify-content-between border--block">
              <a href="{{ route('team', [$team->team_id, $team->user_id] ) }}">
                <p class="block-team__text">{{$team->name}}</p>
              </a>
              <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.7474 18.6157C14.9556 18.6157 15.1623 18.5508 15.3387 18.4232C15.6673 18.185 15.8208 17.7757 15.7314 17.3806L14.5091 11.9963L18.6544 8.36095C18.9591 8.09494 19.0755 7.67368 18.9504 7.28823C18.8253 6.9035 18.485 6.63111 18.082 6.59386L12.5972 6.09591L10.4287 1.02122C10.2688 0.648375 9.90464 0.407593 9.50005 0.407593C9.09546 0.407593 8.73132 0.648375 8.57143 1.02035L6.40294 6.09591L0.919016 6.59386C0.51515 6.63024 0.17478 6.9035 0.0496769 7.28823C-0.0754261 7.67296 0.0402546 8.09494 0.344965 8.36095L4.4903 11.9956L3.26798 17.3798C3.1784 17.7757 3.33206 18.185 3.66054 18.4225C3.9883 18.6599 4.42536 18.6782 4.77052 18.4708L9.50005 15.6444L14.2296 18.4724C14.3895 18.5673 14.5676 18.6157 14.7474 18.6157ZM9.50005 14.4269C9.3203 14.4269 9.14229 14.4752 8.98225 14.5701L4.51872 17.2397L5.67233 12.1578C5.75466 11.7961 5.63188 11.4185 5.3524 11.1738L1.43827 7.74109L6.61676 7.27083C6.9896 7.23676 7.31025 7.00236 7.45594 6.6588L9.50005 1.86983L11.5466 6.65952C11.6907 7.00077 12.0114 7.23517 12.3834 7.26924L17.5626 7.73949L13.6486 11.1722C13.3682 11.4176 13.2456 11.7945 13.3287 12.1571L14.4814 17.2389L10.0179 14.5701C9.85797 14.4752 9.67981 14.4269 9.50005 14.4269ZM12.6391 6.19405C12.6391 6.19405 12.6391 6.19492 12.6399 6.19564L12.6391 6.19405ZM6.36264 6.19173L6.36177 6.19333C6.36177 6.19246 6.36177 6.19246 6.36264 6.19173Z" fill="black" />
              </svg>
            </div>
          
          </div>
          @endforeach
          @endif
        
          @if(Session::has('flash_meassage2'))
          <div class="alert alert-success">{{Session::get('flash_meassage2')}}</div>
          @endif
          @if(Session::has('flash_meassage_error'))
          <div class="alert alert-danger">{{Session::get('flash_meassage_error')}}</div>
          @endif
          @if($status == NULL)
          @if($active == 1)
          <form method="POST" action="{{route('createteam')}}">
            @csrf
            <input class="input-footer" name="name" placeholder="Название команды" type="text" style="margin-top:20px;">
            <button class="submit-btn btn--size btn--orange mt-4">Создать</button>
          </form>
          @else
          <h4>Для создания команды Вы должны пройти активацию</h4>
          @endif
          @else
          <h4>Ваш аккаунт был заблокирован</h4>
          @endif
        </div>
      </div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-config-tab">
        <span class="title letter-spacing--none title--pl-sm">Мои турниры</span>

        <div class="container">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#stage_1">Турниры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#stage_2">Матчи</a>
                        </li>
                    </ul>
   
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="stage_1">
                        
                       @if($tournaments != null)
                            <table class="table" style="font-size: 16px;">
                                <thead class=" thead-light">
                               
                                 <tr>
                                  <td class="col">Матчи</td>
                                  <td class="col">Формат</td>
                                  <td class="col">Дата</td>
                                  <td class="col">Логин</td>
                                  <td class="col">Пароль</td>
               
                      
                                    </tr>
                                     </thead>
                @foreach($tournaments as $tournament)
                <tbody>
                <tr class="">
                  <td class=""><b>{{$tournament->name}}#{{$loop->index +1}}.{{$tournament->stage_name}}.{{$tournament->match_name}}.Группа {{$tournament->group_name}}</b></td>
                  <td class="">{{$tournament->format}}</td>
                  <td class="">{{$tournament->tournament_start}}</td>
                  <td class="">{{$tournament->login}}</td>
                  <td class="">{{$tournament->password}}</td>
                </tr>
                </tbody>
                @endforeach
             
            </table>
            @else <h3>Матчей нет</h3>
          @endif
          </div>  
          <div class="tab-pane fade" id="stage_2">
          @if($tournaments_old != null)
          <table class="table" style="font-size: 16px;">
                                <thead class=" thead-light">
                               
                                 <tr>
                                  <td class="col">Матчи</td>
                                  <td class="col">Формат</td>
                                  <td class="col">Дата</td>
                                    </tr>
                                     </thead>
                @foreach($tournaments_old as $tournament)
                <tbody>
                  <tr>
                     <td class=""><b>{{$tournament->name}}#{{$loop->index +1}}.{{$tournament->match_name}}.Группа {{$tournament->group_name}}</b></td>
                     <td class="">{{$tournament->format}}</td>
                     <td class="">{{$tournament->tournament_start}}</td>  
                   </tr>
                   </tbody>
                @endforeach
             
            </table>
            @else  <h3>Матчей нет</h3>
          @endif
          </div>  
        </div>
      </div>
    </div>
      <div class="tab-pane fade" id="nav-config" role="tabpanel" aria-labelledby="nav-config-tab">
        <div class="container">
          <form method="POST" action="{{route('delete_profile', $user_id)}}">
            @csrf
            <button class="submit-btn btn--size btn--mr">Удалить профиль</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<div class="modal fade" id="ModalQuery" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="font-size:16px;">Сообщеdние</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{route('query', $user_id)}}">
          @csrf
          <textarea name="text" id="" cols="50" rows="10" style="font-size:16px;"></textarea>

      </div>
      <div class="modal-footer">
        <button type="btn" class="btn btn-primary" style="font-size:16px;">Сохранить</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection