@extends('layouts.layout')

@section('title', 'Команда')
@section('content')
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
<div class="main">
    <div class="container">
        <div class="row background-gray d-flex align-items-center row-indent-mr">
            <div class="col-lg-3">
                <div class="wrap">
                    @if(!$data==NULL)
                    @foreach($data as $team)
                    @if($team->logo!= null)
                    <img class="brd-img" src="{{ asset("uploads/storage/img/teamlogo/$team->logo")}}" width="224" height="224" alt=""></img>
                    @else
                    <img class="brd-img" src="http://placehold.it/224" alt=""></img>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">

                <h1 class="title text-capitalize font-sz">{{$team->name}}</h1>
                @endforeach
                @endif
                <sub class="subtitle">pubg mobile</sub>

            </div>
            <div class="block d-flex justify-content-start" style="flex-direction:row-reverse">
                @if($networks != null)
                @foreach($networks as $network)
                @if($network->insta != null)
                <a class="footer__social-icons footer__social-icons--indent footer__social-icons--instagram" href="{{$network->insta}}"><i class="fab fa-instagram footer__icons"></i></a>
                @endif
                @if($network->discord != null)
                <a class="footer__social-icons footer__social-icons--indent footer__social-icons--discord" href="{{$network->discord}}"><i class="fab fa-discord footer__icons"></i></a>
                @endif

                @if($network->youtube != null)
                <a class="footer__social-icons footer__social-icons--indent footer__social-icons--youtube" href="{{$network->youtube}}"><i class="fab fa-youtube footer__icons"></i></a>
                @endif
                @endforeach
                @endif
            </div>
        </div>

        <ul class="nav nav-tabs nav-tabss" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-btn " id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="true">Обзор</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-btn " id="lineup-tab" data-bs-toggle="tab" data-bs-target="#lineup" type="button" role="tab" aria-controls="lineup" aria-selected="false">Турниры</button>
            </li>
            @if($chek_admin == 'true')
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-btn" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Настройки</button>
            </li>
            @endif
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
            @if(Session::has('flash_meassage_delete'))
                        <div class="alert alert-success" style="font-size: 16px;">{{Session::get('flash_meassage_delete')}}</div>
                 @endif
                <div class="block-view">
                <h4><a href="{{route('exit_team',$user_id)}}" class="">Покинуть команду</a></h4>
                @if($chek_admin == 'true')
                  
                    <h4 class="input-title">Пригласить друзей в команду</h4>
                    <span class="subtitle subtitle--regular d-block subtitle--twelve">Скопируйте ссылку и отправьте друзьям которые хотят присоедениться вк вашей команды</span>
                    <input class="subtitle subtitle--regular url-input url-input--margin" type="text" id="myInput" value="http://showmatch/addmembers/{{$team_id}}">
                    <button class="submit-btn btn--orange  btn--size btn--mr" onclick="myFunction()">Копировать</button>
                    <div class="orange-line"></div>
                    <h4 class="input-title">Участники</h4>
                    @endif
                    @if(!$members==NULL)
                    @foreach($members as $member)

                    <div class="member-block d-flex justify-content-between member-block--border-b my-4 ">
                        <div class="member__item d-flex align-items-center">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.5 0C4.2617 0 0 4.2617 0 9.5C0 11.7942 0.817633 13.901 2.17677 15.5445C2.18025 15.5493 2.18057 15.5553 2.18437 15.5597C3.16572 16.7431 4.39818 17.6504 5.77157 18.2365C5.7874 18.2432 5.80292 18.2505 5.81875 18.2571C5.9299 18.304 6.04232 18.3474 6.15505 18.3898C6.19938 18.4066 6.24372 18.4237 6.28868 18.4398C6.3859 18.4746 6.48375 18.5076 6.58223 18.5392C6.64525 18.5595 6.70827 18.5795 6.77192 18.5985C6.859 18.6244 6.9464 18.6494 7.03443 18.6732C7.1117 18.6941 7.1896 18.7134 7.2675 18.7321C7.34635 18.7511 7.42552 18.7701 7.505 18.7869C7.59367 18.8059 7.68328 18.8227 7.77322 18.8391C7.84542 18.8524 7.9173 18.8664 7.99013 18.8781C8.08988 18.8942 8.19027 18.9069 8.29097 18.9199C8.35588 18.9281 8.42048 18.9376 8.48572 18.9446C8.59972 18.9566 8.71467 18.9652 8.82993 18.9731C8.88345 18.9769 8.93665 18.9826 8.99048 18.9854C9.15863 18.9949 9.32868 19 9.5 19C9.67132 19 9.84137 18.9949 10.0101 18.9861C10.064 18.9832 10.1172 18.9775 10.1707 18.9737C10.286 18.9655 10.4009 18.9573 10.5149 18.9452C10.5802 18.9382 10.6447 18.9287 10.7097 18.9205C10.8104 18.9075 10.9108 18.8949 11.0105 18.8787C11.083 18.867 11.1552 18.8531 11.2274 18.8398C11.317 18.8233 11.4066 18.8065 11.4956 18.7875C11.5751 18.7704 11.654 18.7517 11.7331 18.7327C11.811 18.7137 11.8889 18.6944 11.9662 18.6738C12.0542 18.6504 12.1416 18.6251 12.2287 18.5991C12.2924 18.5801 12.3554 18.5602 12.4184 18.5399C12.5169 18.5082 12.6147 18.4753 12.712 18.4405C12.7566 18.4243 12.8009 18.4072 12.8456 18.3904C12.9586 18.348 13.0707 18.3043 13.1819 18.2577C13.1977 18.2511 13.2132 18.2438 13.2291 18.2372C14.6021 17.651 15.8349 16.7437 16.8163 15.5604C16.8201 15.5559 16.8204 15.5496 16.8239 15.5452C18.1824 13.901 19 11.7942 19 9.5C19 4.2617 14.7383 0 9.5 0ZM13.3497 17.4863C13.345 17.4886 13.3405 17.4911 13.3358 17.4933C13.2227 17.5478 13.1078 17.5991 12.9919 17.6491C12.9656 17.6602 12.9396 17.6716 12.9133 17.6827C12.812 17.7251 12.7094 17.7653 12.6062 17.8039C12.5631 17.8201 12.5201 17.8359 12.4767 17.8511C12.3851 17.8838 12.2933 17.9151 12.2005 17.9449C12.1429 17.9632 12.0849 17.9806 12.027 17.9977C11.9447 18.0224 11.862 18.0462 11.7784 18.0684C11.7081 18.087 11.6372 18.1041 11.5663 18.1209C11.4918 18.1387 11.4177 18.1567 11.3427 18.1726C11.2607 18.19 11.178 18.2048 11.0957 18.2197C11.0289 18.2321 10.9624 18.2451 10.8949 18.2558C10.8021 18.2704 10.7084 18.2821 10.615 18.2938C10.5558 18.3014 10.4969 18.3103 10.437 18.3166C10.3303 18.328 10.2226 18.3353 10.1153 18.3429C10.0675 18.3461 10.02 18.3515 9.97152 18.354C9.81477 18.3622 9.6577 18.3667 9.5 18.3667C9.3423 18.3667 9.18523 18.3622 9.0288 18.354C8.98067 18.3515 8.93317 18.3464 8.88503 18.3429C8.77737 18.3356 8.67002 18.328 8.5633 18.3166C8.50345 18.3103 8.44455 18.3014 8.38533 18.2938C8.29192 18.2821 8.19818 18.2704 8.1054 18.2558C8.03795 18.2451 7.97145 18.2321 7.90463 18.2197C7.82198 18.2048 7.73933 18.1896 7.65763 18.1726C7.58258 18.1567 7.50817 18.1387 7.43407 18.1209C7.36313 18.1038 7.2922 18.087 7.2219 18.0684C7.13862 18.0462 7.05565 18.0221 6.97332 17.9977C6.91537 17.9806 6.85742 17.9632 6.79978 17.9449C6.707 17.9151 6.61485 17.8838 6.52365 17.8511C6.48027 17.8356 6.4372 17.8198 6.39413 17.8039C6.2909 17.7653 6.1883 17.7251 6.08697 17.6827C6.06068 17.6719 6.03503 17.6605 6.00875 17.6494C5.89285 17.5997 5.7779 17.5481 5.66453 17.4936C5.65978 17.4914 5.65535 17.4892 5.6506 17.4867C4.54575 16.9521 3.56978 16.1934 2.7778 15.2719C3.38992 13.0178 5.12272 11.2008 7.35205 10.4779C7.39607 10.5048 7.44198 10.5288 7.48727 10.5542C7.51387 10.5691 7.54015 10.5849 7.56707 10.5991C7.66143 10.6492 7.75707 10.696 7.85492 10.7382C7.92997 10.7711 8.00755 10.799 8.08482 10.8275C8.10002 10.8329 8.11522 10.8389 8.13042 10.8442C8.55982 10.9962 9.0193 11.0833 9.5 11.0833C9.9807 11.0833 10.4402 10.9962 10.8693 10.8442C10.8845 10.8389 10.8997 10.8329 10.9149 10.8275C10.9921 10.799 11.0697 10.7711 11.1448 10.7382C11.2426 10.696 11.3383 10.6492 11.4326 10.5991C11.4595 10.5846 11.4858 10.5691 11.5124 10.5542C11.5577 10.5288 11.6039 10.5048 11.6483 10.4776C13.8776 11.2008 15.6101 13.0178 16.2225 15.2716C15.4305 16.1928 14.4546 16.9515 13.3497 17.4863ZM6.01667 6.96667C6.01667 5.04608 7.57942 3.48333 9.5 3.48333C11.4206 3.48333 12.9833 5.04608 12.9833 6.96667C12.9833 8.18837 12.3497 9.26345 11.3949 9.88538C11.2702 9.96645 11.1403 10.039 11.007 10.1023C10.9912 10.1099 10.9757 10.1178 10.9598 10.1251C10.0428 10.5422 8.95723 10.5422 8.04017 10.1251C8.02433 10.1178 8.0085 10.1099 7.99298 10.1023C7.85935 10.039 7.72983 9.96645 7.60507 9.88538C6.65032 9.26345 6.01667 8.18837 6.01667 6.96667ZM16.6975 14.669C15.9796 12.5492 14.3418 10.836 12.2493 10.0222C13.0862 9.2682 13.6167 8.1795 13.6167 6.96667C13.6167 4.6968 11.7699 2.85 9.5 2.85C7.23013 2.85 5.38333 4.6968 5.38333 6.96667C5.38333 8.1795 5.91375 9.2682 6.75102 10.0222C4.65848 10.8363 3.02068 12.5492 2.3028 14.669C1.25368 13.2126 0.633333 11.4279 0.633333 9.5C0.633333 4.61098 4.61098 0.633333 9.5 0.633333C14.389 0.633333 18.3667 4.61098 18.3667 9.5C18.3667 11.4279 17.7463 13.2126 16.6975 14.669Z" fill="black" />
                            </svg>
                            <span class="item__tile item__tile--margin">{{$member->name}}</span>
                        </div>

                        @if($member->role=='captain')

                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.7474 18.6158C14.9556 18.6158 15.1623 18.5509 15.3387 18.4233C15.6673 18.1852 15.8208 17.7758 15.7314 17.3808L14.5091 11.9964L18.6544 8.36107C18.9591 8.09506 19.0755 7.6738 18.9504 7.28835C18.8253 6.90362 18.485 6.63123 18.082 6.59398L12.5972 6.09603L10.4287 1.02134C10.2688 0.648497 9.90464 0.407715 9.50005 0.407715C9.09546 0.407715 8.73132 0.648497 8.57143 1.02047L6.40294 6.09603L0.919016 6.59398C0.51515 6.63036 0.17478 6.90362 0.0496769 7.28835C-0.0754261 7.67308 0.0402546 8.09506 0.344965 8.36107L4.4903 11.9957L3.26798 17.3799C3.1784 17.7758 3.33206 18.1852 3.66054 18.4226C3.9883 18.6601 4.42536 18.6783 4.77052 18.4709L9.50005 15.6446L14.2296 18.4725C14.3895 18.5674 14.5676 18.6158 14.7474 18.6158ZM9.50005 14.427C9.3203 14.427 9.14229 14.4753 8.98225 14.5702L4.51872 17.2399L5.67233 12.1579C5.75466 11.7962 5.63188 11.4186 5.3524 11.1739L1.43827 7.74121L6.61676 7.27095C6.9896 7.23689 7.31025 7.00248 7.45594 6.65892L9.50005 1.86995L11.5466 6.65965C11.6907 7.00089 12.0114 7.23529 12.3834 7.26936L17.5626 7.73961L13.6486 11.1723C13.3682 11.4177 13.2456 11.7946 13.3287 12.1572L14.4814 17.239L10.0179 14.5702C9.85797 14.4753 9.67981 14.427 9.50005 14.427ZM12.6391 6.19417C12.6391 6.19417 12.6391 6.19504 12.6399 6.19577L12.6391 6.19417ZM6.36264 6.19185L6.36177 6.19345C6.36177 6.19258 6.36177 6.19258 6.36264 6.19185Z" fill="black" />
                        </svg>
                        @endif
                        @if($chek_admin == 'true')
                        @if($member->role=='member')
                        <div class="">
                            <a href="{{route('add_admin', [$member->user_id, $team_id])}}" class="orange item__tile item__tile--mr" onclick="return alert();">apply admin</a>
                            <a id="delete" href="{{route('delete_member', [$member->user_id, $team_id])}}" class="orange item__tile"  onclick="return alert();">delete</a>
                        </div>
                        @endif
                        @endif
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
           
            <div class="tab-pane fade" id="lineup" role="tabpanel" aria-labelledby="lineup-tab">
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
                                        <th scope="col">Турнир</th>
                                        <th scope="col">Формат</th>
                                        <th scope="col">Дата</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tournaments as $tournament)
                                    <tr>
                                        <td>{{$tournament->name}}</td>
                                        <td>{{$tournament->format}}</td>
                                        <td>{{$tournament->tournament_start}}</td>
                                    </tr>
                                @endforeach   
                            </table>
                          @else Турниров нет
                          @endif
                        </div>
                        <div class="tab-pane fade" id="stage_2">
                        @if($matches != null)
                            <table class="table" style="font-size: 16px;">
                                <thead class="thead-light">
                                @foreach($matches as $match)
                                    <tr>
                                        <th scope="col">{{$match->name}}#{{$loop->index +1}}.{{$match->stage_name}}.{{$match->match_name}}.Группа {{$match->group_name}}</th>
                                        <th scope="col">{{$match->format}}</th>
                                        <th scope="col">{{$match->tournament_start}}</th>
                                    </tr>
                                    @endforeach
                                </thead>
                                <tbody>
                                  
                                <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                 
                            </table>
                        @else Матчей нет
                          @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <!--      @foreach($data as $team)
                 <form method="POST" action="{{route('delete_team', $team->id)}}">
                    @csrf
                    <button class="submit-btn btn--size btn--mr">Удалить команду</button>
                </form> 
                <a type="btn" class="forms__btn btn nav-link btn--orange mt-4" data-toggle="modal" data-target="#ModalQuery">Отпаравить запрос на изменения названия команды </a>
                @endforeach -->
                @if(Session::has('flash_meassage'))
                        <div class="alert alert-success" style="font-size: 16px;">{{Session::get('flash_meassage')}}</div>
                 @endif
                <form method="POST" action="{{route('orders_team_user', $team_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6">
                        <input name="name" placeholder="Название команды" type="tel" class="form-control  subtitle fw-normal input_border" id="">
                        <p></p>
                        <select name="country" id="" style="font-size: 16px;">
                            @foreach($countries as $country)
                            <option value="{{$country}}">{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
                </form>

                @if($networks != null)
                @foreach($networks as $network)
                <form method="POST" action="{{route('add_networks_update', $team_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <p></p>
                        <p></p>
                        <p></p>
                        <h2>Ссылки на социальные сети</h2>
                        <div class="col-lg-6">
                            <input name="insta" placeholder="instagram.com/" type="tel" class="form-control  subtitle fw-normal input_border" id="" value="{{$network->insta}}">
                            <input name="discord" placeholder="discord.com/" type="text" class="form-control  subtitle fw-normal input_border" id="" value="{{$network->discord}}">
                            <input name="vk" placeholder="vk.com/" type="text" class="form-control  subtitle fw-normal input_border" id="" value="{{$network->vk}}">
                            <input name="youtube" placeholder="youtube.com/" type="text" class="form-control  subtitle fw-normal input_border" id="" value="{{$network->youtube}}">
                        </div>
                    </div>
                    <button type="btn" class="btn  submit-btn btn--size btn--orange btn--margin" style="margin-right: 10px;">Сохранить</button>
                    <a href="{{route('delete_team', $team_id)}}" class="btn  submit-btn btn--size  btn--margin">Удалить команду</a>
                    <a href="" class="btn  submit-btn btn--size  btn--margin" data-toggle="modal" data-target="#ModalLogo">Установить логотип</a>
                </form>
                @endforeach
                @else
                <form method="POST" action="{{route('add_networks', $team_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <h2>Ссылки на социальные сети</h2>
                        <div class="col-lg-6">
                            <input name="insta" placeholder="instagram.com/" type="tel" class="form-control  subtitle fw-normal input_border" id="">
                            <input name="discord" placeholder="discord.com/" type="text" class="form-control  subtitle fw-normal input_border" id="">
                            <input name="vk" placeholder="vk.com/" type="text" class="form-control  subtitle fw-normal input_border" id="">
                            <input name="youtube" placeholder="youtube.com/" type="text" class="form-control  subtitle fw-normal input_border" id="">
                        </div>
                    </div>
                    <button type="btn" class="btn  submit-btn btn--size btn--orange btn--margin" style="margin-right: 10px;">Сохранить</button>
                    <a href="{{route('delete_team', $team_id)}}" class="btn  submit-btn btn--size  btn--margin">Удалить команду</a>
                    <a href="" class="btn  submit-btn btn--size  btn--margin" data-toggle="modal" data-target="#ModalLogo">Установить логотип</a>
                </form>
                @endif
                <div class="modal fade" id="ModalLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content" style="font-size: 16px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Загрузить логотип</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="font-size: 16px;">
                                <form method="POST" action="{{route('set_logo', $team_id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control input__profile subtitle fw-normal" id="fileInput" name="logo">

                                    <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
                function alert(){
                    if(confirm("Вы подтверждаете операцию?") ){
     
                       return(true);
                    }else{
                       return(false);
                    }
            }
            </script>
<script>
    
function myFunction() {
   copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  
}
</script>




        @endsection