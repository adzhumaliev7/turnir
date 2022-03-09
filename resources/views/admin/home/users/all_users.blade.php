@extends('admin.admin_layout')

@section('content')
@if($users != null)

<div class="container">
  <div class="row">
   <div class="col-md-12">

 
  <form action="{{route('search')}}">
  <div class="form-row">
    <div class="form-group col-md-10">
        <input type="text" class="form-control" id="search" name="search" placeholder="Введите имя или почту">
    </div>
    <div class="form-group col-md-2">
        <button type="submit" class="btn btn-primary btn-block"> 
          Поиск
        </button>
    </div>
  </div>
</form>
</div>
  <table class="table search_result" >
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
        <td scope="row">{{$loop->index + 1}}</td>
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
          @if($user->verification == 'verified')
          Верифицирован 
         @elseif($user->verification == 'rejected') Отклонен
        
          @endif
        </td>
        <td>
       
            <a href="{{route('users_card', $user->id)}}" class="btn btn-primary">Просмотр</a>
        
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
  {{$users->links()}}
  @else
  <h4>Нет данных</h4>
  @endif
  </div>
</div>
<script>
</script>
@endsection