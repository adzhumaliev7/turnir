@extends('admin.admin_layout')
@section('content')

    <style>
        .table-pubg_td-number{
            height: 100px;
        }
    </style>

    <div class="container">
        @if($turnir->active)
        <a href="{{route('finish', $turnir->id)}}" type="button" class="btn btn-danger mt-4">Завершить турнир</a>
        @else
            <a href="#" class="btn btn-success mt-4"> Турнир заверщён </a>
        @endif

        <div class="tournament-page_content --full float">
            <div class="top-link-b text-center">
                <a href="{{route('stoge.create', $turnir->id)}}" type="button" class="btn btn-success mt-4">Создать этап</a>
                @if($stage)

                    <a href="{{route('stoge.edit', $stage->id)}}" type="button" class="btn btn-secondary mt-4">Редактировать текущий этап</a>
                    <a href="{{route('stoge.destroy', $stage->id)}}" type="button" class="btn btn-danger mt-4">Удалить текущий этап</a></br>
                @endif
                @foreach($turnir->stages as $stageF)
                    <a href="{{route('standings', [$turnir->id, $stageF->id])}}" class="top-link @if($stage->id == $stageF->id) active @endif">
                        {{$stageF->stage_name}}
                    </a>
                @endForeach
            </div>

            <div class="top-link-b --stage  text-center">
                @if($stage)
                    <a href="{{route('group.create', [$turnir->id, $stage->id])}}" type="button" class="btn btn-success mt-4">Создать группу</a>
                    @if($group)
                        <a href="{{route('group.edit', $group->id)}}" type="button" class="btn btn-secondary mt-4">Редактировать текущую группу</a>
                        <a href="{{route('group.destroy', $group->id)}}" type="button" class="btn btn-danger mt-4">Удалить текущую группу</a></br>
                    @endif
                @endif

                @foreach($stage->groups ?? [] as $groupF)
                    <a href="{{route('standings', [$turnir->id, $stage->id, $groupF->id])}}" class="top-link @if($group->id == $groupF->id) active @endif ">
                        {{$groupF->group_name}}
                    </a>
                @endForeach

            </div>

            @if($group)
                <div class=" text-center">
                    <a href="{{route('team.create', [$turnir->id, $group->id])}}" type="button" class="btn btn-success mt-4">Добавить команду</a>
                    <a href="{{route('matches.create', $group->id)}}" type="button" class="btn btn-success mt-4">изменение матчей</a>
                </div>
            @endif

            <div class="my-5 table-box example1-viewport">
                @if($group)
                <table id="example" class="display example1-content" style="width:100%">
                    <thead>
                    <tr>
                        <th @if($group->matches->isNotEmpty()) rowspan="2" @endIf>#</th>
                        <th @if($group->matches->isNotEmpty()) rowspan="2" @endIf>Удалить</th>
                        <th @if($group->matches->isNotEmpty()) rowspan="2" @endIf>Команды</th>
                        <th @if($group->matches->isNotEmpty()) rowspan="2" @endIf>Kills</th>
                        <th @if($group->matches->isNotEmpty()) rowspan="2" @endIf>Place</th>
                        <th @if($group->matches->isNotEmpty()) rowspan="2" @endIf>total</th>
                        @foreach($group->matches ?? [] as $matcthe)
                            <th colspan="3">
                                {{$matcthe->match_name}}, login:  {{$matcthe->login}} , password:  {{$matcthe->password}}
                            </th>
                        @endforeach
                    </tr>

                    @if($group->matches->isNotEmpty())
                        <tr>
                            @foreach($group->matches ?? [] as $matcthe)
                                <th>
                                    Kills PTS
                                </th>
                                <th>
                                    Plase PTS
                                </th>
                                <th>
                                    Total PTS
                                </th>
                            @endforeach
                        </tr>
                    @endif
                    </thead>
                    <tbody>
                    @foreach($group->tournamentGroupTeams ?? [] as $teamsF)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{route('team.destroy', $teamsF->id)}}"> <i class="fa fa-fw fa-times-circle text-danger"></i> </a> </td>
                            <td>
                                <a href="{{route('team.show', $teamsF->id)}}" class="table-pubg_team">
                                <span class="table-pubg_team-img">
                                    @if($teamsF->team->logo != null)
                                <img class="" src="{{ asset("uploads/storage/img/teamlogo/".$teamsF->team->logo)}}" width="37" height="35" alt="" />   
                                @else 
                                <img class="" src="{{ asset("uploads/storage/img/default/noimage.png")}}" width="37" height="35" alt="" />   
                                @endif
                                </span> 
                                  
                                    <span class="table-pubg_team-text">{{$teamsF->team->name}}</span>
                                </a>
                            </td>
                            <td>{{$teamsF->kills_pts ?? 0}}</td>
                            <td>{{$teamsF->place_pts ?? 0}}</td>
                            <td>{{$teamsF->kills_pts + $teamsF->place_pts}}</td>


                            @foreach($group->matches ?? [] as $matcthee)
                                <td>{{$matcthee->res->where('tournament_group_teams_id', $teamsF->id)->sum('kills_pts')}}</td>
                                <td>{{$matcthee->res->where('tournament_group_teams_id', $teamsF->id)->first()->place_pts ?? 0}}</td>
                                <td>
                                    {{$matcthee->res->where('tournament_group_teams_id', $teamsF->id)->first() ?
        $matcthee->res->where('tournament_group_teams_id', $teamsF->id)->first()->place_pts + $matcthee->res->where('tournament_group_teams_id', $teamsF->id)->sum('kills_pts') : 0}}</td>
                            @endforeach
                        </tr>
                    @endforeach


                    </tbody>
                </table>
                @endif
{{--                <div class="table-pubg_wrapper js-sv-parent">--}}
{{--                    <div class="table-pubg_left">--}}
{{--                        <table class="table-pubg">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th class="table-pubg_td-number">--}}
{{--                                    <span class="table-pubg_link">#</span>--}}
{{--                                    <div class="table-pubg_bottom"></div>--}}
{{--                                </th>--}}
{{--                                <th class="table-pubg_td-number">--}}
{{--                                    <span class="table-pubg_link">#</span>--}}
{{--                                    <div class="table-pubg_bottom"></div>--}}
{{--                                </th>--}}
{{--                                <th style="width: 250px;">--}}
{{--                                    <span class="table-pubg_link">Команды</span>--}}
{{--                                    <div class="table-pubg_bottom"></div>--}}
{{--                                </th>--}}

{{--                                <th>--}}
{{--                                    <div class="table-pubg_link"></div>--}}
{{--                                    <div class="table-pubg_bottom">--}}
{{--                                        <span>Kills PTS</span>--}}
{{--                                    </div>--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    <div class="table-pubg_link"></div>--}}
{{--                                    <div class="table-pubg_bottom">--}}
{{--                                        <span>Place PTS</span>--}}
{{--                                    </div>--}}
{{--                                </th>--}}
{{--                                <th>--}}
{{--                                    <div class="table-pubg_link"></div>--}}
{{--                                    <div class="table-pubg_bottom">--}}
{{--                                        <span>Total PTS</span>--}}
{{--                                    </div>--}}
{{--                                </th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}

{{--                                @foreach($group->tournamentGroupTeams ?? [] as $teamsF)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$loop->iteration}}</td>--}}
{{--                                        <td><a href="{{route('team.destroy', $teamsF->id)}}"> <i class="fa fa-fw fa-times-circle text-danger"></i> </a> </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{route('team.show', $teamsF->id)}}" class="table-pubg_team">--}}
{{--                                                <span class="table-pubg_team-img" style="background-image: url(https://images.pinger.kz/fit?file=storage%2Ffiles%2Fbd56a5ae257dc0ede5c52c080e64a895.jpg&amp;width=32&amp;height=32&amp;type=auto&amp;quality=95);"></span>--}}
{{--                                                <span class="table-pubg_team-text">{{$teamsF->team->name}}</span>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td>{{$teamsF->kills_pts ?? 0}}</td>--}}
{{--                                        <td>{{$teamsF->place_pts ?? 0}}</td>--}}
{{--                                        <td>{{$teamsF->kills_pts + $teamsF->place_pts}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}

{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}

{{--                    <div class="table-pubg_main table-box js-sv">--}}
{{--                        <table class="table-pubg js-sv-selector" style="transform: translateX(0px);">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    @foreach($group->matches ?? [] as $matcthe)--}}
{{--                                        <th colspan="3">--}}
{{--                                            <span class="table-pubg_link">--}}
{{--                                             {{$matcthe->match_name}}, login:  {{$matcthe->login}} , password:  {{$matcthe->password}}--}}
{{--                                            </span>--}}
{{--                                        </th>--}}
{{--                                    @endforeach--}}

{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    @foreach($group->matches ?? [] as $matcthe)--}}
{{--                                        <th>--}}
{{--                                            <div class="table-pubg_link"></div>--}}
{{--                                            <div class="table-pubg_bottom">--}}
{{--                                                <span>Kills PTS</span>--}}
{{--                                            </div>--}}
{{--                                        </th>--}}
{{--                                        <th>--}}
{{--                                            <div class="table-pubg_link"></div>--}}
{{--                                            <div class="table-pubg_bottom">--}}
{{--                                                <span>Place PTS</span>--}}
{{--                                            </div>--}}
{{--                                        </th>--}}
{{--                                        <th>--}}
{{--                                            <div class="table-pubg_link"></div>--}}
{{--                                            <div class="table-pubg_bottom">--}}
{{--                                                <span>Total PTS</span>--}}
{{--                                            </div>--}}
{{--                                        </th>--}}
{{--                                    @endforeach--}}
{{--                                </tr>--}}

{{--                            </thead>--}}
{{--                            <tbody>--}}

{{--                                @foreach($group->tournamentGroupTeams ?? [] as $teamsFF)--}}
{{--                                    <tr>--}}
{{--                                        @foreach($teamsFF->group->matches as $m => $matcheee)--}}
{{--                                            @php($temp = $matcheee->res->whereIn('team_id', $teamsFF->team->teammates->where('tournament_id', $turnir->id)->pluck('id', 'id')))--}}

{{--                                            @if($temp->count())--}}
{{--                                                <td>{{$temp->sum('kills_pts')}}</td>--}}
{{--                                                <td>{{$temp->first()->place_pts}}</td>--}}
{{--                                                <td>{{$temp->first()->place_pts + $temp->sum('kills_pts')}}</td>--}}
{{--                                            @else--}}
{{--                                                <td>0</td>--}}
{{--                                                <td>0</td>--}}
{{--                                                <td>0</td>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}

{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

        </div>

    </div>
@endsection
