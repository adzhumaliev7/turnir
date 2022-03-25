@extends('admin.admin_layout')

@section('content')

    <a href="{{route('create_tournament')}}" style="max-width: 300px" class="btn btn-block btn-info my-3">Создание турнира</a>
    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Список турниров</h3>
        </div>

        <div class="card-body">

            <table data-url="{{route('getDataTurnirList')}}" class="turnirTable table table-bordered table-striped">
                <thead>
                    <th>#</th>
                    <th>Название</th>
                    <th>Формат</th>
                    <th>Дата</th>
                    <th>Участники<br> <span>(Успешно/Заявки/Всего)</span> </th>
                    <th>Статус</th>
                    <th>Инструменты</th>
                </thead>
            </table>
        </div>
    </div>


{{--<div class="container">--}}
{{--  <a href="{{route('create_tournament')}}" class="btn btn-primary">Создать</a>--}}
{{--  @if($tournaments != null)--}}
{{--  <table class="table">--}}
{{--    <thead class="thead-light">--}}
{{--      <tr>--}}
{{--        <th scope="col">Название турнира</th>--}}
{{--        <th scope="col">Дата турнира</th>--}}
{{--        <th scope="col">Действие</th>--}}

{{--      </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--      @foreach($tournaments as $tournament)--}}
{{--      <tr>--}}
{{--        <td>{{$tournament->name}}</td>--}}
{{--        <td>{{$tournament->tournament_start}} {{$tournament->games_time}}</td>--}}
{{--        <td><a type="button" href="{{route('tournament_view',$tournament->id)}}" class="btn btn-primary">Редктирвоать</a>--}}
{{--          <a href="{{route('delete_tournament', $tournament->id)}}" type="button" class="btn btn-danger">Удалить</a>--}}
{{--          <a href="{{route('tournaments_teams', $tournament->id)}}" type="button" class="btn btn-success">Заявки_{{$tournament->order_count}}</a>--}}
{{--          <a href="{{route('standings', $tournament->id)}}" type="button" class="btn btn-dark">Обзор</a>--}}
{{--          <a href="{{route('duplication', $tournament->id)}}" type="button" class="btn btn-dark">Дублирование</a>--}}
{{--        </td>--}}

{{--      </tr>--}}
{{--      @endforeach--}}


{{--    </tbody>--}}
{{--  </table>--}}
{{--  @else--}}
{{--  <h4>Нет данных</h4>--}}
{{--  @endif--}}
{{--</div>--}}
@endsection
