@extends('layouts.layout')

@section('title', 'Команда')
@section('content')

<header>    
  <div class="header-pubg__bg-2">
      @include('main.inc.nav_header')
    </div>

</header>

<main>  
  <div class="team-bg h-100 header--pb header margin--none">
    <div class="container header-profile">
    <div class="header-sz">
        <div class="header__panel d-flex  align-items-center flex-sm-nowrap flex-wrap">
          <div class="header__profile">
          @if(!$data==NULL)
                    @foreach($data as $team)
         
                    @if($team->logo!= null)
            <a href=""  data-toggle="modal" data-target="#ModalLogo">
              <img class="header__img" src="{{ asset("uploads/storage/img/teamlogo/$team->logo")}}" width="150" height="150" alt="" alt="profile" />
            </a>
            @else
           <a href=""  data-toggle="modal" data-target="#ModalLogo">
             <img src="{{ asset("uploads/storage/img/default/noimage.png")}}"  width="250" height="200" class="" style="opacity: .8">
              </a>
              @endif
          </div>
          <div class="header__nick">
        
            <h1 class="title  text-capitalize font-sz text--responsive" style=" color: white;">{{$team->name}} </h1>
            <sub class="subtitle subtitle--gray text--responsive">pubg mobile</sub>
            @endforeach
                @endif
          <div class="block d-flex justify-content-start mt-3" style="flex-direction:row-reverse">
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
      </div>
    </div>
    </div>
  </div>
  <div class="main">
    <div class="">
     <div class="profile__accordion">
      <nav class="container">
              <div
                class="flex-wrap d-flex justify-content-start nav-tabs nav line--none flex-sm-nowrap"
                id="nav-tab" 
                role="tablist">
                <button
                  class="accordion__btn nav-link " 
                  id="nav-review-tab"
                  role="tab" 
                  aria-controls="nav-review" 
                  aria-selected="true"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-review"
                  type="button">
                    обзор
                  <svg
                    width="20"
                    height="18"
                    viewBox="0 0 20 18"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_107_89)">
                      <path
                        d="M9.99998 5.00001C9.63197 5.00576 9.26668 5.06422 8.91526 5.17362C9.07782 5.45949 9.16437 5.78227 9.16665 6.11112C9.16665 6.36647 9.11635 6.61931 9.01864 6.85522C8.92092 7.09114 8.77769 7.30549 8.59713 7.48605C8.41657 7.66661 8.20222 7.80983 7.96631 7.90755C7.7304 8.00527 7.47755 8.05556 7.2222 8.05556C6.89335 8.05328 6.57058 7.96673 6.2847 7.80417C6.05916 8.58639 6.08545 9.41975 6.35984 10.1862C6.63424 10.9527 7.14283 11.6133 7.81358 12.0747C8.48433 12.536 9.28323 12.7746 10.0971 12.7567C10.911 12.7388 11.6986 12.4652 12.3484 11.9748C12.9982 11.4843 13.4772 10.8019 13.7176 10.0241C13.9579 9.24631 13.9475 8.4126 13.6877 7.64107C13.4279 6.86954 12.932 6.19931 12.2701 5.7253C11.6083 5.2513 10.8141 4.99755 9.99998 5.00001ZM19.8791 8.38195C17.9962 4.70799 14.2684 2.22223 9.99998 2.22223C5.73158 2.22223 2.00276 4.70973 0.120814 8.3823C0.0413845 8.53942 0 8.71301 0 8.88907C0 9.06513 0.0413845 9.23872 0.120814 9.39584C2.0038 13.0698 5.73158 15.5556 9.99998 15.5556C14.2684 15.5556 17.9972 13.0681 19.8791 9.39549C19.9586 9.23837 20 9.06478 20 8.88872C20 8.71266 19.9586 8.53907 19.8791 8.38195ZM9.99998 13.8889C6.57463 13.8889 3.43436 11.9792 1.73852 8.8889C3.43436 5.79862 6.57429 3.8889 9.99998 3.8889C13.4257 3.8889 16.5656 5.79862 18.2614 8.8889C16.566 11.9792 13.4257 13.8889 9.99998 13.8889Z"
                        fill="black"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_107_89">
                        <rect width="20" height="17.7778" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </button>
                <button
                  class="accordion__btn nav-link"
                  id="nav-tourney-tab" 
                  data-bs-toggle="tab" 
                  data-bs-target="#nav-tourney" 
                  type="button" 
                  aria-controls="nav-tourney" 
                  aria-selected="false">
                    Турниры
                  <svg
                    width="20"
                    height="20"
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fas"
                    data-icon="trophy"
                    class="svg-inline--fa fa-trophy fa-w-18"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 576 512">
                    <path
                      fill="none"
                      d="M552 64H448V24c0-13.3-10.7-24-24-24H152c-13.3 0-24 10.7-24 24v40H24C10.7 64 0 74.7 0 88v56c0 35.7 22.5 72.4 61.9 100.7 31.5 22.7 69.8 37.1 110 41.7C203.3 338.5 240 360 240 360v72h-48c-35.3 0-64 20.7-64 56v12c0 6.6 5.4 12 12 12h296c6.6 0 12-5.4 12-12v-12c0-35.3-28.7-56-64-56h-48v-72s36.7-21.5 68.1-73.6c40.3-4.6 78.6-19 110-41.7 39.3-28.3 61.9-65 61.9-100.7V88c0-13.3-10.7-24-24-24zM99.3 192.8C74.9 175.2 64 155.6 64 144v-16h64.2c1 32.6 5.8 61.2 12.8 86.2-15.1-5.2-29.2-12.4-41.7-21.4zM512 144c0 16.1-17.7 36.1-35.3 48.8-12.5 9-26.7 16.2-41.8 21.4 7-25 11.8-53.6 12.8-86.2H512v16z">
                    </path>
                  </svg>
                </button>
                @if($chek_admin == 'true')
                                <button
                  class="accordion__btn nav-link"
                  id="nav-config-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-config"
                  type="button"
                  aria-controls="nav-config" 
                  aria-selected="false">
                    Настройка
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M19.0388 12.332L17.3747 11.3711C17.5427 10.4648 17.5427 9.53516 17.3747 8.62891L19.0388 7.66797C19.2302 7.5586 19.3162 7.33204 19.2537 7.1211C18.8201 5.73047 18.0818 4.47266 17.1169 3.42579C16.9685 3.26563 16.7263 3.22657 16.5388 3.33594L14.8747 4.29688C14.1755 3.69532 13.3708 3.23047 12.4997 2.92579V1.00782C12.4997 0.789068 12.3474 0.597662 12.1326 0.550787C10.699 0.230475 9.23022 0.2461 7.86694 0.550787C7.65209 0.597662 7.49975 0.789068 7.49975 1.00782V2.92969C6.63256 3.23829 5.82788 3.70313 5.12475 4.30079L3.46459 3.33985C3.27319 3.23047 3.03491 3.26563 2.88647 3.42969C1.92163 4.47266 1.18334 5.73047 0.749751 7.125C0.683345 7.33594 0.773188 7.5625 0.964594 7.67188L2.62866 8.63282C2.46069 9.53907 2.46069 10.4688 2.62866 11.375L0.964594 12.3359C0.773188 12.4453 0.687251 12.6719 0.749751 12.8828C1.18334 14.2734 1.92163 15.5313 2.88647 16.5781C3.03491 16.7383 3.27709 16.7773 3.46459 16.668L5.12866 15.707C5.82788 16.3086 6.63256 16.7734 7.50366 17.0781V19C7.50366 19.2188 7.656 19.4102 7.87084 19.457C9.30444 19.7773 10.7732 19.7617 12.1365 19.457C12.3513 19.4102 12.5037 19.2188 12.5037 19V17.0781C13.3708 16.7695 14.1755 16.3047 14.8787 15.707L16.5427 16.668C16.7341 16.7773 16.9724 16.7422 17.1208 16.5781C18.0857 15.5352 18.824 14.2773 19.2576 12.8828C19.3162 12.668 19.2302 12.4414 19.0388 12.332V12.332ZM9.99975 13.125C8.27709 13.125 6.87475 11.7227 6.87475 10C6.87475 8.27735 8.27709 6.875 9.99975 6.875C11.7224 6.875 13.1247 8.27735 13.1247 10C13.1247 11.7227 11.7224 13.125 9.99975 13.125Z"
                      fill="black">
                    </path>
                  </svg>
                </button>
                @endif
                                <button  onclick="document.location='{{route("profile")}}'"
                  class="accordion__btn nav-link">
                    К профилю
                </button>
              </div>
            </nav>
          </div>
          </div>
    <div class="tab-content tab-panels" id="nav-tabContent">
    
      <div class="tab-pane active  " id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
          <div class="container">
      @if(Session::has('flash_meassage_delete'))
                        <div class="alert alert-success" style="font-size: 16px;">{{Session::get('flash_meassage_delete')}}</div>
                 @endif
                <div class="block-view">
                @if($chek_admin != 'true')   
                <h4><a href="{{route('exit_team',[$user_id, $team_id])}}" class="">Покинуть команду</a></h4>
                @endif
                @if($chek_admin == 'true')
                  
                    <h4 class="input-title">Пригласить друзей в команду</h4>
                    <span class="subtitle subtitle--regular d-block subtitle--twelve">Скопируйте ссылку и отправьте друзьям которые хотят присоедениться к вашей команды</span>
                    <input class="subtitle subtitle--regular url-input url-input--margin" type="text" id="myInput" value="https://bigplay.gg/{{$link}}/{{$team_id}}">
                    <button class="submit-btn" onclick="myFunction()">Копировать</button>
                    <a href="{{route('generate_link', [$team_id,$user_id])}}" class="link_styles">Сгенерировать новую ссылку</a>
                    <div class="orange-line"></div>
                     @if(Session::has('flash_meassage_error'))
                        <div class="alert alert-danger" style="font-size: 16px;">{{Session::get('flash_meassage_error')}}</div>
                 @endif
                    <h4 class="input-title">Участники</h4>
                    @endif
                    @if(!$members==NULL)
                    @foreach($members as $member)
                    <div class="member-block d-flex justify-content-between member-block--border-b my-4 ">
                        <div class="member__item d-flex align-items-center">
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.5 0C4.2617 0 0 4.2617 0 9.5C0 11.7942 0.817633 13.901 2.17677 15.5445C2.18025 15.5493 2.18057 15.5553 2.18437 15.5597C3.16572 16.7431 4.39818 17.6504 5.77157 18.2365C5.7874 18.2432 5.80292 18.2505 5.81875 18.2571C5.9299 18.304 6.04232 18.3474 6.15505 18.3898C6.19938 18.4066 6.24372 18.4237 6.28868 18.4398C6.3859 18.4746 6.48375 18.5076 6.58223 18.5392C6.64525 18.5595 6.70827 18.5795 6.77192 18.5985C6.859 18.6244 6.9464 18.6494 7.03443 18.6732C7.1117 18.6941 7.1896 18.7134 7.2675 18.7321C7.34635 18.7511 7.42552 18.7701 7.505 18.7869C7.59367 18.8059 7.68328 18.8227 7.77322 18.8391C7.84542 18.8524 7.9173 18.8664 7.99013 18.8781C8.08988 18.8942 8.19027 18.9069 8.29097 18.9199C8.35588 18.9281 8.42048 18.9376 8.48572 18.9446C8.59972 18.9566 8.71467 18.9652 8.82993 18.9731C8.88345 18.9769 8.93665 18.9826 8.99048 18.9854C9.15863 18.9949 9.32868 19 9.5 19C9.67132 19 9.84137 18.9949 10.0101 18.9861C10.064 18.9832 10.1172 18.9775 10.1707 18.9737C10.286 18.9655 10.4009 18.9573 10.5149 18.9452C10.5802 18.9382 10.6447 18.9287 10.7097 18.9205C10.8104 18.9075 10.9108 18.8949 11.0105 18.8787C11.083 18.867 11.1552 18.8531 11.2274 18.8398C11.317 18.8233 11.4066 18.8065 11.4956 18.7875C11.5751 18.7704 11.654 18.7517 11.7331 18.7327C11.811 18.7137 11.8889 18.6944 11.9662 18.6738C12.0542 18.6504 12.1416 18.6251 12.2287 18.5991C12.2924 18.5801 12.3554 18.5602 12.4184 18.5399C12.5169 18.5082 12.6147 18.4753 12.712 18.4405C12.7566 18.4243 12.8009 18.4072 12.8456 18.3904C12.9586 18.348 13.0707 18.3043 13.1819 18.2577C13.1977 18.2511 13.2132 18.2438 13.2291 18.2372C14.6021 17.651 15.8349 16.7437 16.8163 15.5604C16.8201 15.5559 16.8204 15.5496 16.8239 15.5452C18.1824 13.901 19 11.7942 19 9.5C19 4.2617 14.7383 0 9.5 0ZM13.3497 17.4863C13.345 17.4886 13.3405 17.4911 13.3358 17.4933C13.2227 17.5478 13.1078 17.5991 12.9919 17.6491C12.9656 17.6602 12.9396 17.6716 12.9133 17.6827C12.812 17.7251 12.7094 17.7653 12.6062 17.8039C12.5631 17.8201 12.5201 17.8359 12.4767 17.8511C12.3851 17.8838 12.2933 17.9151 12.2005 17.9449C12.1429 17.9632 12.0849 17.9806 12.027 17.9977C11.9447 18.0224 11.862 18.0462 11.7784 18.0684C11.7081 18.087 11.6372 18.1041 11.5663 18.1209C11.4918 18.1387 11.4177 18.1567 11.3427 18.1726C11.2607 18.19 11.178 18.2048 11.0957 18.2197C11.0289 18.2321 10.9624 18.2451 10.8949 18.2558C10.8021 18.2704 10.7084 18.2821 10.615 18.2938C10.5558 18.3014 10.4969 18.3103 10.437 18.3166C10.3303 18.328 10.2226 18.3353 10.1153 18.3429C10.0675 18.3461 10.02 18.3515 9.97152 18.354C9.81477 18.3622 9.6577 18.3667 9.5 18.3667C9.3423 18.3667 9.18523 18.3622 9.0288 18.354C8.98067 18.3515 8.93317 18.3464 8.88503 18.3429C8.77737 18.3356 8.67002 18.328 8.5633 18.3166C8.50345 18.3103 8.44455 18.3014 8.38533 18.2938C8.29192 18.2821 8.19818 18.2704 8.1054 18.2558C8.03795 18.2451 7.97145 18.2321 7.90463 18.2197C7.82198 18.2048 7.73933 18.1896 7.65763 18.1726C7.58258 18.1567 7.50817 18.1387 7.43407 18.1209C7.36313 18.1038 7.2922 18.087 7.2219 18.0684C7.13862 18.0462 7.05565 18.0221 6.97332 17.9977C6.91537 17.9806 6.85742 17.9632 6.79978 17.9449C6.707 17.9151 6.61485 17.8838 6.52365 17.8511C6.48027 17.8356 6.4372 17.8198 6.39413 17.8039C6.2909 17.7653 6.1883 17.7251 6.08697 17.6827C6.06068 17.6719 6.03503 17.6605 6.00875 17.6494C5.89285 17.5997 5.7779 17.5481 5.66453 17.4936C5.65978 17.4914 5.65535 17.4892 5.6506 17.4867C4.54575 16.9521 3.56978 16.1934 2.7778 15.2719C3.38992 13.0178 5.12272 11.2008 7.35205 10.4779C7.39607 10.5048 7.44198 10.5288 7.48727 10.5542C7.51387 10.5691 7.54015 10.5849 7.56707 10.5991C7.66143 10.6492 7.75707 10.696 7.85492 10.7382C7.92997 10.7711 8.00755 10.799 8.08482 10.8275C8.10002 10.8329 8.11522 10.8389 8.13042 10.8442C8.55982 10.9962 9.0193 11.0833 9.5 11.0833C9.9807 11.0833 10.4402 10.9962 10.8693 10.8442C10.8845 10.8389 10.8997 10.8329 10.9149 10.8275C10.9921 10.799 11.0697 10.7711 11.1448 10.7382C11.2426 10.696 11.3383 10.6492 11.4326 10.5991C11.4595 10.5846 11.4858 10.5691 11.5124 10.5542C11.5577 10.5288 11.6039 10.5048 11.6483 10.4776C13.8776 11.2008 15.6101 13.0178 16.2225 15.2716C15.4305 16.1928 14.4546 16.9515 13.3497 17.4863ZM6.01667 6.96667C6.01667 5.04608 7.57942 3.48333 9.5 3.48333C11.4206 3.48333 12.9833 5.04608 12.9833 6.96667C12.9833 8.18837 12.3497 9.26345 11.3949 9.88538C11.2702 9.96645 11.1403 10.039 11.007 10.1023C10.9912 10.1099 10.9757 10.1178 10.9598 10.1251C10.0428 10.5422 8.95723 10.5422 8.04017 10.1251C8.02433 10.1178 8.0085 10.1099 7.99298 10.1023C7.85935 10.039 7.72983 9.96645 7.60507 9.88538C6.65032 9.26345 6.01667 8.18837 6.01667 6.96667ZM16.6975 14.669C15.9796 12.5492 14.3418 10.836 12.2493 10.0222C13.0862 9.2682 13.6167 8.1795 13.6167 6.96667C13.6167 4.6968 11.7699 2.85 9.5 2.85C7.23013 2.85 5.38333 4.6968 5.38333 6.96667C5.38333 8.1795 5.91375 9.2682 6.75102 10.0222C4.65848 10.8363 3.02068 12.5492 2.3028 14.669C1.25368 13.2126 0.633333 11.4279 0.633333 9.5C0.633333 4.61098 4.61098 0.633333 9.5 0.633333C14.389 0.633333 18.3667 4.61098 18.3667 9.5C18.3667 11.4279 17.7463 13.2126 16.6975 14.669Z" fill="black" />
                            </svg>
                          <span class="item__tile item__tile--margin" style="font-size: 1.6rem;">{{$member->name}}</span>
                        </div>
                        @if($member->role=='captain')
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.7474 18.6158C14.9556 18.6158 15.1623 18.5509 15.3387 18.4233C15.6673 18.1852 15.8208 17.7758 15.7314 17.3808L14.5091 11.9964L18.6544 8.36107C18.9591 8.09506 19.0755 7.6738 18.9504 7.28835C18.8253 6.90362 18.485 6.63123 18.082 6.59398L12.5972 6.09603L10.4287 1.02134C10.2688 0.648497 9.90464 0.407715 9.50005 0.407715C9.09546 0.407715 8.73132 0.648497 8.57143 1.02047L6.40294 6.09603L0.919016 6.59398C0.51515 6.63036 0.17478 6.90362 0.0496769 7.28835C-0.0754261 7.67308 0.0402546 8.09506 0.344965 8.36107L4.4903 11.9957L3.26798 17.3799C3.1784 17.7758 3.33206 18.1852 3.66054 18.4226C3.9883 18.6601 4.42536 18.6783 4.77052 18.4709L9.50005 15.6446L14.2296 18.4725C14.3895 18.5674 14.5676 18.6158 14.7474 18.6158ZM9.50005 14.427C9.3203 14.427 9.14229 14.4753 8.98225 14.5702L4.51872 17.2399L5.67233 12.1579C5.75466 11.7962 5.63188 11.4186 5.3524 11.1739L1.43827 7.74121L6.61676 7.27095C6.9896 7.23689 7.31025 7.00248 7.45594 6.65892L9.50005 1.86995L11.5466 6.65965C11.6907 7.00089 12.0114 7.23529 12.3834 7.26936L17.5626 7.73961L13.6486 11.1723C13.3682 11.4177 13.2456 11.7946 13.3287 12.1572L14.4814 17.239L10.0179 14.5702C9.85797 14.4753 9.67981 14.427 9.50005 14.427ZM12.6391 6.19417C12.6391 6.19417 12.6391 6.19504 12.6399 6.19577L12.6391 6.19417ZM6.36264 6.19185L6.36177 6.19345C6.36177 6.19258 6.36177 6.19258 6.36264 6.19185Z" fill="black" />
                        </svg>
                        @endif
                        @if($chek_admin == 'true')
                        @if($member->role=='member')
                        <div class="">
                             <a href="{{route('add_admin', [$member->user_id, $team_id, $user_id])}}" class=" item__tile " onclick="return alert();">apply admin |</a>
                            <a id="delete" href="{{route('delete_member', [$member->user_id, $team_id])}}" class=" item__tile"  onclick="return alert();">delete</a>
                        </div>
                        @endif
                        @endif
                    </div>
                    @endforeach
                    @endif
                </div>
                </div>
      </div>
     
      <div class="tab-pane " id="nav-tourney" role="tabpanel" aria-labelledby="nav-config-tab">
      <div class="container">
      @include('main.team.tournaments')
      </div>
    </div>
      <div class="tab-pane fade" id="nav-config" role="tabpanel" aria-labelledby="nav-config-tab">
      <div class="container">
      @include('main.team.settings')
     </div>
      </div>
    </div>
 
</div>
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
               
</main>


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

     