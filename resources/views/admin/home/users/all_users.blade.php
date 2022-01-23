@extends('admin.admin_layout')

@section('content')
@if($users != "")

<div class="container">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>

        <th scope="col">Имя</th>

        <th scope="col">Почта</th>
        <th scope="col">Статус</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)

      <tr>
        <td scope="row">{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          @if($user->verified==1)
          Активирован
          @elseif($user->verified==0)Зарегистрированн

          @endif
        </td>
        <!--  <td><a href=" /admin_panel/users_card/{{$user->id}}" class="btn btn-primary">Просмотр</a> -->

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