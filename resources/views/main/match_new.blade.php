@extends('layouts.layout')
@section('title', $tournament->name)
@section('description', $tournament->meta)
@section('content')
    <style>
        .table-pubg_td-number{
            height: 100px;
        }
        .table-box {
            max-width: 1024px;
            overflow-x: scroll;
        }
    </style>
    <header>
            @include('main.inc.header')
            <div class="container" id="timesssssssss" data-time="{{$tournament->end_reg->getTimestampMs()}}">
      
             <div class="row background-match d-flex align-items-center row-indent-mr">
        
             <div class="col-lg-12">
                <div style="margin: 10px; ">
           
                            <h1 class="title text-capitalize font-sz text--responsive text-light">
                                {{$tournament->name}}
                            </h1>
                            <h5 class="text-white" style="opacity: .8;"> Статус:
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
                            </h5>       
                </div>

                    <div class="m-3" > 
                <span class="margin_span text-white margin_span" >
                Начало турнира: {{$tournament->tournament_start}}    </span>
                <span class="text-white margin_span ">{{$tournament->timezone}}</span>
                <span class="text-white margin_span ">Формат: {{$tournament->format}}</span>
                <span class="text-white  margin_span"> Призовой фонд:  {{$tournament->price}} </span>
                <span class="text-white margin_span "> Количество слотов {{$tournament->slot_kolvo}}</span>
                          
                </div>                  
            </div>

        </div>
           
        </div>
      
    </header>
    <div class="main">
       
            <div class="container">
            <div class="profile__accordion">
                <nav>
                    <div class="flex-wrap d-flex justify-content-start nav nav-tabs line--none flex-sm-nowrap" id="nav-tab" role="tablist">
                        <button class="accordion__btn nav-link" 
                        id="nav-home-tab" 
                        data-bs-toggle="tab"
                         data-bs-target="#nav-home"
                          type="button" role="tab" 
                          aria-controls="nav-home"
                           aria-selected="true">
                            обзор
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_107_89)">
                                    <path d="M9.99998 5.00001C9.63197 5.00576 9.26668 5.06422 8.91526 5.17362C9.07782 5.45949 9.16437 5.78227 9.16665 6.11112C9.16665 6.36647
                                    9.11635 6.61931 9.01864 6.85522C8.92092 7.09114 8.77769 7.30549 8.59713 7.48605C8.41657 7.66661 8.20222 7.80983 7.96631 7.90755C7.7304 8.00527
                                    7.47755 8.05556 7.2222 8.05556C6.89335 8.05328 6.57058 7.96673 6.2847 7.80417C6.05916 8.58639 6.08545 9.41975 6.35984 10.1862C6.63424 10.9527
                                    7.14283 11.6133 7.81358 12.0747C8.48433 12.536 9.28323 12.7746 10.0971 12.7567C10.911 12.7388 11.6986 12.4652 12.3484 11.9748C12.9982 11.4843
                                    13.4772 10.8019 13.7176 10.0241C13.9579 9.24631 13.9475 8.4126 13.6877 7.64107C13.4279 6.86954 12.932 6.19931 12.2701 5.7253C11.6083 5.2513
                                    10.8141 4.99755 9.99998 5.00001ZM19.8791 8.38195C17.9962 4.70799 14.2684 2.22223 9.99998 2.22223C5.73158 2.22223 2.00276 4.70973 0.120814
                                    8.3823C0.0413845 8.53942 0 8.71301 0 8.88907C0 9.06513 0.0413845 9.23872 0.120814 9.39584C2.0038 13.0698 5.73158 15.5556 9.99998 15.5556C14.2684
                                    15.5556 17.9972 13.0681 19.8791 9.39549C19.9586 9.23837 20 9.06478 20 8.88872C20 8.71266 19.9586 8.53907 19.8791 8.38195ZM9.99998 13.8889C6.57463
                                    13.8889 3.43436 11.9792 1.73852 8.8889C3.43436 5.79862 6.57429 3.8889 9.99998 3.8889C13.4257 3.8889 16.5656 5.79862 18.2614 8.8889C16.566 11.9792
                                    13.4257 13.8889 9.99998 13.8889Z" fill="currentColor" />
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
                                <path d="M3 7C4.10313 7 5 6.10313 5 5C5 3.89687 4.10313 3 3 3C1.89688 3 1 3.89687 1 5C1 6.10313 1.89688 7 3 7ZM17 7C18.1031 7 19 6.10313 19 5C19
                                3.89687 18.1031 3 17 3C15.8969 3 15 3.89687 15 5C15 6.10313 15.8969 7 17 7ZM18 8H16C15.45 8 14.9531 8.22188 14.5906 8.58125C15.85 9.27188 16.7437
                                10.5188 16.9375 12H19C19.5531 12 20 11.5531 20 11V10C20 8.89687 19.1031 8 18 8ZM10 8C11.9344 8 13.5 6.43437 13.5 4.5C13.5 2.56562 11.9344 1 10
                                1C8.06563 1 6.5 2.56562 6.5 4.5C6.5 6.43437 8.06563 8 10 8ZM12.4 9H12.1406C11.4906 9.3125 10.7688 9.5 10 9.5C9.23125 9.5 8.5125 9.3125 7.85938
                                9H7.6C5.6125 9 4 10.6125 4 12.6V13.5C4 14.3281 4.67188 15 5.5 15H14.5C15.3281 15 16 14.3281 16 13.5V12.6C16 10.6125 14.3875 9 12.4 9ZM5.40938
                                8.58125C5.04688 8.22188 4.55 8 4 8H2C0.896875 8 0 8.89687 0 10V11C0 11.5531 0.446875 12 1 12H3.05938C3.25625 10.5188 4.15 9.27188 5.40938 8.58125Z" />
                            </svg>
                        </button>
                        <button title="" class="accordion__btn nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                            Правила
                            <svg width="20" height="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sticky-note" class="svg-inline--fa fa-sticky-note fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor" d="M312 320h136V56c0-13.3-10.7-24-24-24H24C10.7 32 0 42.7 0 56v400c0 13.3 10.7 24 24 24h264V344c0-13.2 10.8-24 24-24zm129
                                55l-98 98c-4.5 4.5-10.6 7-17 7h-6V352h128v6.1c0 6.3-2.5 12.4-7 16.9z"></path>
                            </svg>
                        </button>
                        <button class="accordion__btn nav-link" id="nav-config-tab" data-bs-toggle="tab" data-bs-target="#nav-config" type="button" role="tab" aria-controls="nav-config" aria-selected="false">
                            Сетка
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.0388 12.332L17.3747 11.3711C17.5427 10.4648 17.5427 9.53516 17.3747 8.62891L19.0388 7.66797C19.2302 7.5586 19.3162 7.33204 19.2537
                                 7.1211C18.8201 5.73047 18.0818 4.47266 17.1169 3.42579C16.9685 3.26563 16.7263 3.22657 16.5388 3.33594L14.8747 4.29688C14.1755 3.69532 13.3708
                                 3.23047 12.4997 2.92579V1.00782C12.4997 0.789068 12.3474 0.597662 12.1326 0.550787C10.699 0.230475 9.23022 0.2461 7.86694 0.550787C7.65209 0.597662
                                 7.49975 0.789068 7.49975 1.00782V2.92969C6.63256 3.23829 5.82788 3.70313 5.12475 4.30079L3.46459 3.33985C3.27319 3.23047 3.03491 3.26563 2.88647
                                 3.42969C1.92163 4.47266 1.18334 5.73047 0.749751 7.125C0.683345 7.33594 0.773188 7.5625 0.964594 7.67188L2.62866 8.63282C2.46069 9.53907 2.46069
                                 10.4688 2.62866 11.375L0.964594 12.3359C0.773188 12.4453 0.687251 12.6719 0.749751 12.8828C1.18334 14.2734 1.92163 15.5313 2.88647 16.5781C3.03491
                                 16.7383 3.27709 16.7773 3.46459 16.668L5.12866 15.707C5.82788 16.3086 6.63256 16.7734 7.50366 17.0781V19C7.50366 19.2188 7.656 19.4102 7.87084
                                 19.457C9.30444 19.7773 10.7732 19.7617 12.1365 19.457C12.3513 19.4102 12.5037 19.2188 12.5037 19V17.0781C13.3708 16.7695 14.1755 16.3047 14.8787
                                 15.707L16.5427 16.668C16.7341 16.7773 16.9724 16.7422 17.1208 16.5781C18.0857 15.5352 18.824 14.2773 19.2576 12.8828C19.3162 12.668 19.2302 12.4414
                                 19.0388 12.332V12.332ZM9.99975 13.125C8.27709 13.125 6.87475 11.7227 6.87475 10C6.87475 8.27735 8.27709 6.875 9.99975 6.875C11.7224 6.875 13.1247
                                 8.27735 13.1247 10C13.1247 11.7227 11.7224 13.125 9.99975 13.125Z" fill="currentColor" />
                            </svg>
                        </button>
                    </div>
                </nav>
            </div>


            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="font-size: 16px;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-size: 16px;" id="exampleModalLongTitle">Выбрать участников (Минимум 3 игрока, максимум 4)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="font-size: 16px;">
                            <form method="POST" action="{{route('join', $tournament->id)}}">
                                @csrf
                                @if($members != null)

                                    @foreach($members as $member)

                                    <input type="checkbox" name="members[]" value="{{$member->user_id}}"  <?php if($member->user->verified == 0 || $member->user->nickname == null || $member->user->game_id == null ||$member->user->status != null ){ echo "disabled";?>  <?}?>> {{$member->user->name}} </br>

                                    @endforeach

                                @else
                                    <h3>Нет учасников</h3>
                                @endif
                                <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content tab-panels" id="nav-tabContent">
                <div class="tab-pane  fade show  <?echo $active1?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="container">
                        @if (\Session::has('error_msg'))
                            <div class="alert alert-danger"  style="font-size: 16px;">
                                <ul>
                                    <li>{!! \Session::get('error_msg') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg">
                            <div style="font-size: 16px;" class="container">
                                <div>{!!$tournament->description!!}</div>

                            </div>

                            </div>
                            <div class="col-lg-4">
                                <form action="post">
                                    <div class="holding holding-block">
                                        <p class="subtitle holding__title">Дата проведения</p>
                                        <span class="subtitle subtitle--semi-medium">{{$tournament->tournament_start}}</span>
                                       <span class="subtitle subtitle--semi-medium d-block"> {{$tournament->timezone}} </span>
                                        <hr>
                                          @if($tournament->endDate($tournament->start_reg)) 
                                        <p class="subtitle subtitle--semi-medium">до конца регистрации:</p>
                                             <div class="holding__timer">
                                                 <div class="holding__wrapper">
                                                     <div class="holding__item holding__number" data-countdown="{{Carbon\Carbon::parse($tournament->end_reg)->format('Y/m/d H:i:s')}}"></div>

                                                     <div></div>
                                                 </div>
                                                 <div class="holding__wrapper">
                                                 </div>
                                             </div>
                                         @else  <span class="subtitle subtitle--semi-medium">Регистрация еще не началась</span>   
                                        @endif
                                        <hr>
                                      
                                        <details class="holding__accordion">
                                            <summary class="subtitle subtitle--semi-medium">Команды {{$teams_count}} / {{$tournament->slot_kolvo}}</summary>
                                          

                                        </details>

                                               @if($tournament->endDate($tournament->start_reg) == true)
                                        @if($tournament->endDate($tournament->end_reg) == false)
                                            @if($userTeam)
                                                @if(!$tournametTeam)
                                                    @if($tournament->order_count < $tournament->slot_kolvo)
                                                        <div class="block-btn">
                                                            <a href="" class="btn  submit-btn  mt-4" data-toggle="modal" data-target="#exampleModalLong"> Принять участие</a>
                                                        <!--   <a href="{{route('join', $tournament->id)}}" class="submit-btn btn--size btn--orange btn--margin">Принять участие</a> -->
                                                        </div>
                                                    @else
                                                        <h3>Мест нет</h3>
                                                    @endif
                                                @else
                                                    @if($tournametTeam->status == 'processed')
                                                        @if($tournament->endDate($tournament->tournament_start) == false)
                                                            <div class="block-btn">
                                                            <a href="{{route('revoke', [$tournametTeam->tournament_id,$tournametTeam->team_id])}}" class="btn  submit-btn  mt-4"  > Отозвать заявку</a>
                                                            </div>
                                                         @endif 
                                                    @elseif($tournametTeam->status == 'accepted')
                                                    <div class="block-btn">
                                                         <h3>Ваша команда зарегистрирована</h3>
                                                    </div>
                                                    @elseif($tournametTeam->status == 'not_accepted')
                                                        <div class="block-btn">
                                                            <h3>Ваша заявка отклонена</h3>
                                                        </div>
                                                    @endif
                                                @endif
                                            @else
                                                <div class="block-btn">
                                                    <h3>Подать заявку может только капитан</h3>
                                                </div>
                                            @endif

                                        @elseif($tournament->endDate($tournament->start_reg)==false)
                                            <div class="block-btn">
                                                <h3>Регистрация ещё не началась</h3>
                                            </div>
                                        @elseif($tournament->endDate($tournament->end_reg))
                                            <div class="block-btn">
                                                <h3>Регистрация закончилась</h3>
                                            </div>

                                        @else
                                            <div class="block-btn">
                                                <h3>Турнир закончился</h3>
                                            </div>
                                        @endif
                                    @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="container">

                  
                        @if($teams != "")
                          
                        <table class="table" style="font-size: 16px;">
                  <tr class="table--line">
                    <td class="table--logo"></td>
                    <th class="table--name table--head">Команда</td>
                    <th class="table--flag"></td>
                    <th class="table--members table--head">участники</td>
                    <th class="table--status table--head">Статус</td>
                  </tr>
                    @foreach($teams as $team)
                  <tr class="table--line">
                    <td class="table--logo">
                 
                      @if($team->team->logo != null)    
                    
                        <img class="" src="{{ asset("uploads/storage/img/teamlogo/".$team->team->logo)}}" width="37" height="35" alt="" />
                      @endif
                    </td>
                    <td class="table--name table--text">  {{$team->team->name }}</td>
                    <td class="table--flag">
                  
                    </td>
                    <td class="table--members table--text"> 
                    ({{$team->memberCount}}/4)
                    </td>
                    <td class="table--status table--text"> 

                         @if($team->status == 'accepted')
                         Принят
                         @else
                           На проверке
                         @endif
                    </td>
                  </tr>
                    @endforeach
				
                </table>
                 {!!$teams->appends(['tab'=>'nav-profile-tab'])->links()!!}
                        @else
                            <span class="subtitle subtitle--semi-medium">Нет команд</span>
                        @endif       
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-config-tab">
                    <div style="font-size: 16px;" class="container">
                       <div>{!!$tournament->rule!!}</div>

                    </div>
                </div>
                <div class="tab-pane fade show <?echo $active2?>" id="nav-config" role="tabpanel" aria-labelledby="nav-config-tab">
                    <div class="container">
                    @if($tournament->endDate($tournament->tournament_start))
                    <div class="tournament-page_content --full float">
                        <div class="top-link-b text-center">
                            @foreach($tournament->stages as $stageF)
                                <a href="{{route('match', [$tournament->id, $stageF->id])}}" class="top-link text-center @if($stage->id == $stageF->id) active @endif">
                                    {{$stageF->stage_name}}
                                </a>
                            @endForeach
                        </div>

                        <div class="top-link-b text-center --stage">
                            @foreach($stage->groups ?? [] as $groupF)
                                <a href="{{route('match', [$tournament->id, $stage->id, $groupF->id])}}" class="top-link @if($group->id == $groupF->id) active @endif ">
                                    {{$groupF->group_name}}
                                </a>
                            @endForeach
                        </div>
                        <div class="my-5 table-box">
                            <div class="table-pubg_wrapper js-sv-parent">
                                <div class="table-pubg_left">
                                    <table class="table-pubg">
                                        <thead>
                                            <tr>
                                                <th class="table-pubg_td-number">
                                                    <span class="table-pubg_link">#</span>
                                                    <div class="table-pubg_bottom"></div>
                                                </th>
                                                <th style="width: 250px;">
                                                    <span class="table-pubg_link">Команды</span>
                                                    <div class="table-pubg_bottom"></div>
                                                </th>

                                                <th>
                                                    <div class="table-pubg_link"></div>
                                                    <div class="table-pubg_bottom">
                                                        <span>Kills PTS</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="table-pubg_link"></div>
                                                    <div class="table-pubg_bottom">
                                                        <span>Place PTS</span>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="table-pubg_link"></div>
                                                    <div class="table-pubg_bottom">
                                                        <span>Total PTS</span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($group->tournamentGroupTeams ?? [] as $teamsF)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                                        <span class="table-pubg_team">
                                                            <span class="table-pubg_team-img">
                                                           
                                                          <img class="" src="{{ asset("uploads/storage/img/teamlogo/".$teamsF->team->logo)}}" width="37" height="35" alt="" />   
                                                          </span> 

                                                         
                                                        
                                                            <span class="table-pubg_team-text">{{$teamsF->team->name}} </span>
                                                        </span>
                                                    </td>
                                                    <td>{{$teamsF->kills_pts ?? 0}}</td>
                                                    <td>{{$teamsF->place_pts ?? 0}}</td>
                                                    <td>{{$teamsF->kills_pts + $teamsF->place_pts}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="example1-viewport table-pubg_main table-box js-sv ">
                                    <table class=" example1-content table-pubg js-sv-selector " style="transform: translateX(0px);">
                                        <thead>
                                            <tr>
                                                @foreach($group->matches ?? [] as $matcthe)
                                                    <th colspan="3">
                                                        <span class="table-pubg_link">
                                                            {{$matcthe->match_name}}
                                                        </span>
                                                    </th>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach($group->matches ?? [] as $matcthe)
                                                    <th>
                                                        <div class="table-pubg_link"></div>
                                                        <div class="table-pubg_bottom">
                                                            <span>Kills PTS</span>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="table-pubg_link"></div>
                                                        <div class="table-pubg_bottom">
                                                            <span>Place PTS</span>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="table-pubg_link"></div>
                                                        <div class="table-pubg_bottom">
                                                            <span>Total PTS</span>
                                                        </div>
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($group->tournamentGroupTeams ?? [] as $teamsFF)
                                                <tr>
                                                    @foreach($teamsFF->group->matches as $m => $matcheee)
                                                        @php($temp = $matcheee->res->whereIn('team_id', $teamsFF->team->teammates->where('tournament_id', $tournament->id)->pluck('id', 'id')))

                                                        @if($temp->count())
                                                            <td>{{$temp->sum('kills_pts')}}</td>
                                                            <td>{{$temp->first()->place_pts}}</td>
                                                            <td>{{$temp->first()->place_pts + $temp->sum('kills_pts')}}</td>
                                                        @else
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>console.log('hac');</script>
                    @else
                        <h3 class="text-center">Информация появится со стартом турнира</h3>
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>


    <script>

     const nav = qs('tab');
     console.log(nav)
        if (nav && document.getElementById(nav)) {
          document.getElementById(nav).click()
        }
      
      function qs(key) {
        key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, '\\$&');
        var match = location.search.match(new RegExp('[?&]'+key+'=([^&]+)(&|$)'));
        return match && decodeURIComponent(match[1].replace(/\+/g, ''));
      }
      $('#nav-tab .accordion__btn').on('click', function (e) {
        var url = window.location.href;        
        var urlSplit = url.split( '?' );       
        var obj = { title : '', url: urlSplit[0] + '?tab=' + this.getAttribute('id')};       
        history.pushState(obj, obj.title, obj.url);
      })
    </script>

@endsection
