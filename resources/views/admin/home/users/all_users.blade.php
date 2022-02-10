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
        <th scope="col">Верификация</th>
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
          @elseif($user->verified==0)Зарегистрирован
          @endif
          /   
          @if($user->nickname != null && $user->game_id != null)
            Игровой
          @else Не игровой 
          @endif
        </td>
        <td>
          @if($user->verification=='verified')
          Верифицирован 
          @elseif($user->verification=='on_check')На проверке
          @elseif($user->verification==null) Нет данных для верификации
          @else отклонен 

          @endif
        </td>
        <td>
        @if($user->verification=='verified')
          Верифицирован 
          @elseif($user->verification=='on_check')На проверке
          @elseif($user->verification==null) Нет данных для верификации
          @else отклонен 

          @endif
        </td>
        <td>
           
          @if($user->doc_photo != null && $user->doc_photo2 != null)
            <a href="{{route('users_card', $user->id)}}" class="btn btn-primary">Просмотр</a>
          @endif
          @if($user->status !='ban'  &&  $user->id != 1)
          <button type="button" class="btn btn-danger js-btn" data-id="Сообщение" data-path="{{route('add_ban', $user->id)}}">
          Бан
        </button>
       
       @elseif($user->id != 1)
        <a href="{{route('unblock', $user->id)}}" class="btn btn-primary">Разблокировать</a>
        @endif
        
       
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