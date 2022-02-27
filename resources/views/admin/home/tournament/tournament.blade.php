@extends('admin.admin_layout')

@section('content')
<div class="container">
  <a href="{{route('create_tournament')}}" class="btn btn-primary">Создать</a>
  @if($tournaments != null)
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Название турнира</th>
        <th scope="col">Дата турнира</th>
        <th scope="col">Действие</th>

      </tr>
    </thead>
    <tbody>
      @foreach($tournaments as $tournament)
      <tr>

        <td>{{$tournament->name}}</td>
        <td>{{$tournament->tournament_start}} {{$tournament->games_time}}</td>
        <td><a type="button" href="{{route('tournament_view',$tournament->id)}}" class="btn btn-primary">Редктирвоать</a>
          <a href="{{route('delete_tournament', $tournament->id)}}" type="button" class="btn btn-danger">Удалить</a>
          <a href="{{route('tournaments_teams', $tournament->id)}}" type="button" class="btn btn-success">Заявки</a>
          <a href="{{route('standings', $tournament->id)}}" type="button" class="btn btn-dark">Обзор</a>
          <a href="{{route('duplication', $tournament->id)}}" type="button" class="btn btn-dark">Дублирование</a>
        </td>

      </tr>
      @endforeach


    </tbody>
  </table>
  @else
  <h4>Нет данных</h4>
  @endif
</div>
@endsection
