@extends('admin.admin_layout')

@section('content')
<div class="container">
  <a href="{{route('create_tournament')}}" class="btn btn-primary">Создать</a>
  @if($tournaments != "")
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Название турнира</th>
        <th scope="col">Страна</th>
        <th scope="col">Дата турнира</th>
        <th scope="col">Действие</th>

      </tr>
    </thead>
    <tbody>

      @foreach($tournaments as $tournament)
      <tr>
        <td scope="row">{{$tournament->id}}</td>
        <td>{{$tournament->name}}</td>
        <td>{{$tournament->country}}</td>
        <td>{{$tournament->tournament_start}} {{$tournament->games_time}}</td>
        <td><a type="button" href="{{route('draft_tournament_view',$tournament->id)}}" class="btn btn-primary">Редктирвоать</a>
          <a href="{{route('delete_tournament', $tournament->id)}}" type="button" class="btn btn-danger">Удалить</a>
          <a href="{{route('draft_tournaments_active', $tournament->id)}}" type="button" class="btn btn-success">Активировать</a>
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