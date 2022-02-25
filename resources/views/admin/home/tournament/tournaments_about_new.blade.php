@extends('admin.admin_layout')
@section('content')

    <style>
        .table-pubg_td-number{
            height: 100px;
        }
    </style>

    <div class="container">

        <div class="tournament-page_content --full float">
            <div class="top-link-b">
                <a href="{{route('stoge.create', $turnir->id)}}" type="button" class="btn btn-success mt-4">Создать этап</a>
                @if($stage)
                    <a href="{{route('stoge.destroy', $stage->id)}}" type="button" class="btn btn-danger mt-4">Удалить текущий этап</a></br>
                @endif
                @foreach($turnir->stages as $stageF)
                    <a href="{{route('standings', [$turnir->id, $stageF->id])}}" class="top-link @if($stage->id == $stageF->id) active @endif">
                        {{$stageF->stage_name}}
                    </a>
                @endForeach
            </div>

            <div class="top-link-b --stage">
                @if($stage)
                    <a href="{{route('group.create', [$turnir->id, $stage->id])}}" type="button" class="btn btn-success mt-4">Создать группу</a>
                    @if($group)
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
                <a href="{{route('team.create', [$turnir->id, $group->id])}}" type="button" class="btn btn-success mt-4">Добавить команду</a>
                <a href="{{route('matches.create', $group->id)}}" type="button" class="btn btn-success mt-4">изменение матчей</a>
            @endif

            <div class="group">
                <div class="table-pubg_wrapper js-sv-parent">
                    <div class="table-pubg_left">
                        <table class="table-pubg">
                            <thead>
                            <tr>
                                <th class="table-pubg_td-number">
                                    <span class="table-pubg_link">#</span>
                                    <div class="table-pubg_bottom"></div>
                                </th>
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
                                        <td><a href="{{route('team.destroy', $teamsF->id)}}"> <i class="fa fa-fw fa-times-circle text-danger"></i> </a> </td>
                                        <td>
                                            <a href="{{route('team.show', $teamsF->id)}}" class="table-pubg_team">
                                                <span class="table-pubg_team-img" style="background-image: url(https://images.pinger.kz/fit?file=storage%2Ffiles%2Fbd56a5ae257dc0ede5c52c080e64a895.jpg&amp;width=32&amp;height=32&amp;type=auto&amp;quality=95);"></span>
                                                <span class="table-pubg_team-text">{{$teamsF->team->name}}</span>
                                            </a>
                                        </td>
                                        <td>{{$teamsF->kills_pts ?? 0}}</td>
                                        <td>{{$teamsF->place_pts ?? 0}}</td>
                                        <td>{{$teamsF->kills_pts ?? 0 + $teamsF->place_pts ?? 0}}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="table-pubg_main table-box js-sv">
                        <table class="table-pubg js-sv-selector" style="transform: translateX(0px);">
                            <thead>
                                <tr>
                                    @foreach($group->matches ?? [] as $matcthe)
                                        <th colspan="3">
                                            <span class="table-pubg_link">
                                             {{$matcthe->match_name}}, login:  {{$matcthe->login}} , password:  {{$matcthe->password}}
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
                                            @php($temp = $matcheee->res->whereIn('team_id', $teamsFF->team->teammates->where('tournament_id', $turnir->id)->pluck('id', 'id')))

                                            @if($temp->count())
                                                <td>{{$temp->sum('kills_pts')}}</td>
                                                <td>{{$teamsFF->place_pts}}</td>
                                                <td>{{$teamsFF->place_pts + $temp->sum('kills_pts')}}</td>
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

    </div>
@endsection
