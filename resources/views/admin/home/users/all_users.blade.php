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
          @if($user->doc_photo != null && $user->doc_photo2 != null)
            <a href="{{route('users_card', $user->id)}}" class="btn btn-primary">Просмотр</a>
          @endif
          @if($user->status !='ban')
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
          Бан
        </button>
        @else
        <a href="{{route('unblock', $user->id)}}" class="btn btn-primary">Разблокировать</a>
        @endif
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Сообщение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="POST" action="{{route('add_ban', $user->id)}}">
                  @csrf
                  <textarea name="text" id="" cols="50" rows="10"></textarea>

              </div>
              <div class="modal-footer">

                <button type="btn" class="btn btn-primary">Сохранить</button>
                </form>
              </div>
            </div>
          </div>
        </div>
       
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