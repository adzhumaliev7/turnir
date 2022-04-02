@extends('admin.admin_layout')
@section('content')
    <style>
        .table-pubg_main .table-pubg thead tr th:nth-child(2n) {
            padding: 8px 38px 8px 12px;
        }
    </style>
    <div class="container mt-4">
        <h3>Этап - {{$tournamentGroupTeam->stage->stage_name}}</h3>
        <h3>Список участиников в команде - {{$tournamentGroupTeam->team->name}}</h3>
        <h4>Капитан команды {{$tournamentGroupTeam->team->сaptain->name}} ?? '' </h4>

        <a href="{{route('matches.edit', $tournamentGroupTeam->id)}}" class="btn btn-primary">Раздать очки матчей</a>
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
                            <span class="table-pubg_link">Игроки команды {{$tournamentGroupTeam->team->name}}</span>
                            <div class="table-pubg_bottom"></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($tournamentGroupTeam->team->teammates->where('tournament_id', $tournamentGroupTeam->turnir->id) as $teammate)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <span class="table-pubg_team-text">{{$teammate->user->name}}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="table-pubg_main table-box js-sv">
                <table class="table-pubg js-sv-selector" style="transform: translateX(0px);">
                    <thead>
                        <tr>
                            @foreach($tournamentGroupTeam->group->matches as $matche)
                            <th>
                                <span class="table-pubg_link">{{$matche->match_name}}</span>
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
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>


                    @foreach($tournamentGroupTeam->team->teammates->where('tournament_id',  $tournamentGroupTeam->turnir->id) as $t)
                        <tr>
                        @foreach($tournamentGroupTeam->group->matches as $m => $matcheee)
                            @php($temp2 = $t->matches->whereIn('match_id', $tournamentGroupTeam->group->matches->pluck('id', 'id'))->where('match_id', $matcheee->id)->first())
                            @if($temp2)
{{--                                @dd($tournamentGroupTeam)--}}
                                    <td>{{$temp2->kills_pts}}</td>
                                    <td>{{$temp2->place_pts}}</td>
                                @else
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
        <a href="{{route('standings',[ $tournamentGroupTeam->tournament_id, $tournamentGroupTeam->stage_id, $tournamentGroupTeam->group_id])}}" class="btn btn-link">Назад</a>
    </div>
@endsection
