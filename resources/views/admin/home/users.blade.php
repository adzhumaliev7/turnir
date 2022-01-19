@extends('admin.admin_layout')

@section('content')
@if($users != "")


<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Телефон</th>
      <th scope="col">ФИО</th>
      <th scope="col">Почта</th>
      <th scope="col">Город</th>
      <th scope="col">Статус</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)

    <tr>
      <td scope="row">{{$user->id}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->fio}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->city}}


      </td>
      <td>
        @if($user->verification=='verified')
        Верифицирован
        @elseif($user->verification=='rejected')Вернут на доработку
        @else Не верефицирован
        @endif
      </td>
      <td><a href=" /admin_panel/users_card/{{$user->id}}" class="btn btn-primary">Просмотр</a>
       
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<h4>Нет данных</h4>
@endif
@endsection