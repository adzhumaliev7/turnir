@extends('admin.admin_layout')
@section('content')
<div class="container">


    <div class="row background-gray d-flex align-items-center row-indent-mr">
        <div class="col-lg-3">
            <div class="wrap">
                <img class="brd-img" src="http://placehold.it/224" alt="">
            </div>
        </div>
        <div class="col-lg-4">
         @foreach($datas as $data)
            <h1 class="title text-capitalize font-sz">{{$data->name}}</h1>


        @endforeach
        </div>

    </div>

    <ul class="nav nav-tabs nav-tabss" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link nav-btn " id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="true">Обзор</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link nav-btn " id="lineup-tab" data-bs-toggle="tab" data-bs-target="#lineup" type="button" role="tab" aria-controls="lineup" aria-selected="false">№№№№</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link nav-btn " id="lineup-tab" data-bs-toggle="tab" data-bs-target="#lineup1" type="button" role="tab" aria-controls="lineup" aria-selected="false">Турнирная таблица</button>
        </li>

    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab">
        @foreach($datas as $data)
        <p>Дата турнира: {{$data->tournament_start}}</p>
        <p>Количество слотов: {{$data->slot_kolvo}}</p>
        <p>Описание: {{$data->description}}</p>
        @endforeach
        </div>

       <div class="tab-pane fade" id="lineup" role="tabpanel" aria-labelledby="lineup-tab">
            <div class="block-view">
        22
            </div>
        </div>


        <div class="tab-pane fade  show active" id="lineup1" role="tabpanel" aria-labelledby="lineup-tab">
            <div class="block-view">
            <a href="{{route('create_stage', $turnir_id)}}" type="button" class="btn btn-success">Создать этап</a></br>
            @if($stages != null)
                @foreach($turnir->stages as $stage)
                     <a href="" type="button" class="btn">{{$stage->stage_name}}__ {{ $stage->id}}</a></br>

                     @if($loop->first)
                     <a href="{{route('create_group', [$turnir_id, $stage->id])}}" type="button" class="btn btn-success">Создать группу</a></br>
                     @endif
                        @foreach($stage->groups as $group)
{{--                            @dump($stage->groupsMany->count())--}}
                        <a href="" type="button" class="btn ">{{$group->group_name}}__{{$group->id}}</a>  <span>place_pts {{$group->place_pts}}</span> </br>
{{--                            @if($group->pivot->current)--}}
{{--                                <a href="{{route('incrementStage', [$group->id, $stage->id])}}" class="btn-success btn">В следующий этап</a>--}}
{{--                                <a href="{{route('decrementStage', [$group->id, $stage->id])}}" class="btn-primary btn">В преведущий этап</a>--}}
{{--                                <a href="{{route('destroy', [$group->id, $turnir->id])}}" class="btn-danger btn">Удалить команду</a>--}}
{{--                            @endif--}}
                        <table class="table">
                            <thead class="thead-light">
                                <tr>

                                    <th scope="col">#</th>
                                    <th scope="col ">Команда</th>


{{--                                    <th scope="col ">Kills PTS</th>--}}
{{--                                    <th scope="col ">Place PTS</th>--}}
{{--                                    <th scope="col ">Total PTS</th>--}}
{{--@dump($stage->matches->count());--}}


                                    @foreach($stage->matches->groupBy('team_id')->max() ?? [] as $masdsth)
                                    <th scope="col ">Kills PTS</th>
                                    <th scope="col ">Place PTS</th>
                                    <th scope="col ">Total PTS</th>
                                    @endforeach
                                    <th scope="col ">Кнопки</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?$rowNumber = 1;?>
                                @foreach($group->tournamentGroupTeams as $team)
                                <tr>
                                    <td><?=$rowNumber++;?></td>
                                    <td>{{$team->team->name}}</td>
{{--                                    @foreach($stage->matches->where('team_id', $team->id) as $math)--}}

{{--                                     @dd($stage->matches->groupBy('team_id')->max())--}}
{{--                                        @if($math->team_id == $team->id)--}}
{{--                                        <td>{{$math->kills_pts ?? 0}}</td>--}}
{{--                                        <td>{{$math->place_pts ?? 0}}</td>--}}
{{--                                        <td>{{$math->total_pts ?? 0}}</td>--}}
{{--                                        @else--}}
{{--                                            <td>0</td>--}}
{{--                                            <td>0</td>--}}
{{--                                            <td>0</td>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}




                                    @if($stage->matches->groupBy('team_id')->max())
                                        @for ($i = 0; $i < $stage->matches->groupBy('team_id')->max()->count(); ++$i)
                                            @if($stage->matches->groupBy('team_id')[$team->id][$i] ?? false)
                                                <td>{{$stage->matches->groupBy('team_id')[$team->id][$i]->kills_pts ?? 0}}</td>
                                                <td>{{$stage->matches->groupBy('team_id')[$team->id][$i]->place_pts ?? 0}}</td>
                                                <td>{{$stage->matches->groupBy('team_id')[$team->id][$i]->total_pts ?? 0}}</td>
                                            @else
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                            @endif
                                        @endfor
                                    @endif

                                    <td> <a href="{{ route('matches.edit', [$team->id, $stage->id])}}" class="btn btn-primary">Изменить матчи</a> </td>
                                </tr>
                                @endforeach
                        </table>


                        @endforeach




                @endforeach
            @else
            <h4>Нет этапов</h4>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    @endsection
