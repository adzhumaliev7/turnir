@extends('admin.admin_layout')

@section('content')
@if($teams != "")
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Команда</th>

      <th scope="col">Статус</th>

    </tr>
  </thead>
  <tbody>
    <? $i = 0; ?>
    @foreach($teams as $team)

    <tr>
      <td scope="row"><? echo ++$i; ?></td>
      <td scope="row">{{$team->name}}</td>

      <td scope="row">
        @if($team->status=='processed') На расмотреннии
        @elseif($team->status =='accepted') Принят
        @elseif($team->status =='not_accepted') Отклонен
        @endif
      </td>
      <td scope="row">
        @if($team->status=='processed')

        <a href="{{route('teams_card', [$team->team_id, $team->tournament_id] )}}" type="button" class="btn btn-success">Просмотр</a>

  

        @endif

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<h4>Нет команд</h4>
@endif
@endsection