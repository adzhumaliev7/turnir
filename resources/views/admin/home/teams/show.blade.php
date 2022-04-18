@extends('admin.admin_layout')

@section('content')

    <div class="container">
        <div class="row background-gray d-flex align-items-center row-indent-mr">
            <div class="col-lg-3">
                <div class="wrap">
                    @if($team->logo != null)
                    <img class="brd-img" src="{{ asset("uploads/storage/img/teamlogo/$team->logo")}}" width="224" height="224" alt="">
                    @else
                    <img class="brd-img" src="{{ asset("uploads/storage/img/default/noimage.png")}}"  width="224" height="224" class="" style="opacity: .8">
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <h1 class="title text-capitalize font-sz">{{$team->name}}</h1>
                <div class="block d-flex justify-content-start" >
                
                @if($team->network)
                    @if($team->network->insta != null)
                    <a class="footer__social-icons footer__social-icons--indent footer__social-icons--instagram m-3"
                       style="font-size: 40px" href="{{$team->network->insta}}">
                        <i class="fab fa-instagram footer__icons"></i>
                    </a>
                    @endif
                    @if($team->network->discord != null)
                    <a class="footer__social-icons footer__social-icons--indent footer__social-icons--discord m-3"
                       style="font-size: 40px" href="{{$team->network->discord}}">
                        <i class="fab fa-discord footer__icons"></i>
                    </a>
                    @endif
                    @if($team->network->youtube != null)
                    <a class="footer__social-icons footer__social-icons--indent footer__social-icons--youtube m-3"
                       style="font-size: 40px" href="{{$team->network->youtube}}">
                        <i class="fab fa-youtube footer__icons"></i>
                    </a>
                    @endif
                 @endif
                </div>
            </div>
        </div>
        <hr style="background-color: orange">

        <table class="table">
            <tbody>
                <tr>
                    <th>Создатель</th>
                    <td>{{$team->сaptain->name ?? 'нету капитана'}}</td>
                </tr>
                <tr>
                    <th>Страна</th>
                    <td>{{$team->country}}</td>
                </tr>
                <tr>
                    <th>Дата создания</th>
                    <td>
                        @if($team->created_at)
                            {{$team->created_at->format('d.m.Y')}}
                        @else
                            не указана
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Всего матчей</th>

                    <td>{{$countMathe}}</td>
                </tr>
            </tbody>
        </table>

        <hr style="background-color: orange">
        <h3 class="text-center">Участники</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nick</th>
                <th scope="col">Pubg nick</th>
                <th scope="col">Pubg id</th>
                <th scope="col">Статус</th>
                <th scope="col">Страна</th>
                <th scope="col">Роль</th>
                <th scope="col">Просмотр</th>
            </tr>
            </thead>
            <tbody>

            @foreach($team->teammatesTeam as $member )
            <tr>
               
                <th scope="row">{{$member->id}}</th>
                <td>{{$member->user->name}}</td>
                <td>{{$member->user->nickname}}</td>
                <td>{{$member->user->game_id}}</td>
                <td>
                    
                @if($member->user->status  == null)
                    @if($member->user->verified == 1)  Активирован
                    @else 
                    Не активирован 
                    @endif
                    /

                    @if($member->user->nickname != null && $member->user->game_id != null)
                    Игровой
                    @else 
                    Не игрвой
                    @endif
                @else 
                    Бан
                @endif         
                </td>
                <td>{{$member->user->country}}</td> 
                <td>{{$member->role}}</td>
                <td><a href="{{route('users_card',$member->user->id )}}" class="btn btn-link"> Посмотреть </a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        <div id="accordion">

            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                       Турниры_ {{$team->teammates->groupBy('tournament_id')->count()}}
                    </button>
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Матчи
                    </button>
                </h5>
                <hr style="background-color: orange">
            </div>


            <div class="card">
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Формат</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Состав</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($team->teammates->groupBy('tournament_id') as $key => $members )
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$members->first()->turnir->name}}</td>
                                    <td>{{$members->first()->turnir->format}}</td>
                                    <td>{{$members->first()->turnir->tournament_start}}</td>
                                    <td>{{implode(', ',$members->pluck('user.name')->toArray() )}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">kills_pts</th>
                                <th scope="col">place_pts</th>
                                <th scope="col">total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($team->groups as $group)
                                @foreach($group->tournamentMatchesResults->groupBy('match_id') as $key => $matchRes)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td>{{$group->turnir->name}} __ {{$group->stage->stage_name}} __ {{$group->group->group_name}} __ {{$matchRes->first()->matche->match_name}}</td>
                                        <td>{{$matchRes->sum('kills_pts')}}</td>
                                        <td>{{$matchRes->first()->place_pts}}</td>
                                        <td>{{$matchRes->sum('kills_pts') + $matchRes->first()->place_pts }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>


        <hr style="background-color: orange">
        <h3 class="text-center">Логи</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Дата</th>
                <th scope="col">Тип</th>
                <th scope="col">Причина</th>
                <th scope="col">Пред</th>
                <th scope="col">Новый</th>
                <th scope="col">Кто</th>
            </tr>
            </thead>
        <tbody>

            @foreach($logs as $log)
                <tr>
                    <th scope="row">{{$log->id}}</th>
                    <td>
                        @if($log->created_at)
                            {{$log->created_at->format('Y.m.d')}}
                        @endif
                    </td>
                    <td>
                      
                        {{$log->type->description }}
                    </td>
                    <td>  {{$log->description ? $log->description : '' }} </td>
                    <td>
                        @if($log->table_name == 'logs')
                            @if($log->type->type == 'chengeTeamCapitan')
                                {{$log->oldAdminUser->name ?? 'пользователь удалён'}}
                            @elseif($log->type->type == 'changeTeamName')
                                {{$log->old_value}}
                            @elseif($log->type->type == 'rejectionOrders')
                                {{$log->turnir? $log->turnir->name: 'Турнир удалили'}}
                            @endif
                        @elseif($log->table_name == 'reports')

                        @endif
                    </td>
                    <td>
                        @if($log->table_name == 'logs')
                            @if($log->type->type == 'chengeTeamCapitan')

                                {{$log->newAdminUser->name ?? 'пользователь удалён'}}
                            @elseif($log->type->type == 'changeTeamName')
                                {{$log->new_value}}
                            @endif
                        @elseif($log->table_name == 'reports')

                        @endif
                    </td>
                    <td>
                        {{$log->user ? $log->user->name: 'пользователь удалён' }}
                    </td>

                </tr>
            @endforeach
            </tbody>
          
        </table>
        <span class="d-flex justify-content-center">{{$logs->links()}}</span>


    </div>

@endsection

