@extends('admin.admin_layout')

@section('content')
<div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#stage_1">1 Этап</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#stage_2">2 Этап</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#stage_3">3 Этап</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#winners">Победители</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="stage_1">
            @if($stages_1 != null)
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Турнир</th>
                        <th scope="col">Команда</th>
                        <th scope="col">Группа</th>
                        <th scope="col">Очки</th>
                        <th scope="col">Победитель</th>
                        <th scope="col"><a href="{{route('update_stage1', $turnir_id)}}" type="button" class="btn btn-success">Добавить баллы</a></th>
                        <th scope="col"><a href="{{route('stage2', $turnir_id)}}" type="button" class="btn btn-success">Создать след.этап</a></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($stages_1 as $stage_1)
                    <tr>

                        <td>{{$stage_1->tournaments_name}}</td>
                        <td>{{$stage_1->team_name}}</td>
                        <td>{{$stage_1->group_id}}</td>
                        <td>{{$stage_1->points}}</td>
                        <td>{{$stage_1->winner}}</td>


                    </tr>
                    @endforeach
            </table>
            @else Данных нет
            @endif
        </div>
        <div class="tab-pane fade" id="stage_2">
            @if($stages_2 != null)
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Турнир</th>
                        <th scope="col">Команда</th>

                        <th scope="col">Очки</th>
                        <th scope="col">Победитель</th>
                        <th scope="col"><a href="{{route('update_stage2', $turnir_id)}}" type="button" class="btn btn-success">Добавить баллы</a></th>
                        <th scope="col"><a href="{{route('stage3', $turnir_id)}}" type="button" class="btn btn-success">Создать след.этап</a></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($stages_2 as $stage_2)
                    <tr>

                        <td>{{$stage_2->tournaments_name}}</td>
                        <td>{{$stage_2->team_name}}</td>

                        <td>{{$stage_2->points}}</td>
                        <td>{{$stage_2->winner}}</td>


                    </tr>
                    @endforeach
            </table>
            @else Данных нет
            @endif
        </div>
        <div class="tab-pane fade" id="stage_3">
            @if($stages_3 != null)
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Турнир</th>
                        <th scope="col">Команда</th>

                        <th scope="col">Очки</th>
                        <th scope="col">Победитель</th>
                        <th scope="col"><a href="{{route('update_stage3', $turnir_id)}}" type="button" class="btn btn-success">Добавить баллы</a></th>
                        <th scope="col"><a href="{{route('winners', $turnir_id)}}" type="button" class="btn btn-success">Закончить турнир</a></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($stages_3 as $stage_3)
                    <tr>

                        <td>{{$stage_3->tournaments_name}}</td>
                        <td>{{$stage_3->team_name}}</td>

                        <td>{{$stage_3->points}}</td>
                        <td>{{$stage_3->winner}}</td>


                    </tr>
                    @endforeach
            </table>
            @else Данных нет
            @endif
        </div>
        <div class="tab-pane fade" id="winners">
            @if($winners != null)
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Турнир</th>
                        <th scope="col">Команда</th>

                        <th scope="col">Очки</th>
                        <th scope="col">Победитель</th>
                      <!--   <th scope="col"><a href="{{route('update_stage3', $turnir_id)}}" type="button" class="btn btn-success">Добавить баллы</a></th>
                        <th scope="col"><a href="" type="button" class="btn btn-success">Создать след.этап</a></th> -->
                    </tr>
                </thead>
                <tbody>

                    @foreach($winners as $winner)
                    <tr>

                        <td>{{$winner->tournaments_name}}</td>
                        <td>{{$winner->team_name}}</td>

                        <td>{{$winner->points}}</td>
                        <td>{{$winner->winner}}</td>


                    </tr>
                    @endforeach
            </table>
            @else Данных нет
            @endif
        </div>
    </div>
</div>



@endsection