<style>
  .modal2 {
    display: none;
    /* Скрыто по умолчанию */
    position: fixed;
    /* Оставаться на месте */
    z-index: 1;
    /* Сидеть на вершине */
    padding-top: 100px;
    /* Расположение коробки */
    margin-left: 250px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    /* Включите прокрутку, если это необходимо */
    background-color: rgb(0, 0, 0);
    /* Цвет запасной вариант  */
    background-color: rgba(0, 0, 0, 0.4);
    /*Черный с непрозрачностью */
  }

  /* Модальное содержание */
  .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    height: 70%;
  }

  /* Кнопка закрытия */
  .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }

  .message {
    display: inline-block;
    /* Строчно-блочный элемент */
    position: relative;
    /* Относительное позиционирование */
  }

  .message:hover::after {
    content: attr(data-title);
    /* Выводим текст */
    position: absolute;
    /* Абсолютное позиционирование */
    left: 20%;
    top: 30%;
    /* Положение подсказки */
    z-index: 1;
    /* Отображаем подсказку поверх других элементов */
    background: rgba(255, 255, 230, 0.9);
    /* Полупрозрачный цвет фона */
    font-family: Arial, sans-serif;
    /* Гарнитура шрифта */
    font-size: 11px;
    /* Размер текста подсказки */
    padding: 5px 10px;
    /* Поля */
    border: 1px solid #333;
    /* Параметры рамки */
  }
</style>
@extends('admin.admin_layout')
@section('content')

@if($user->verification =='verified')
<h3>Верифицирован</h3>
@elseif($user->verification =='rejected')
<h3>Отклонен</h3>
@endif


<div class="container">
    <div class="row">
        <div class="col-4">
            @if($user->photo)
            <a href="" data-toggle="modal" data-target="#ModalLogo">
              <img class="header__img" src="{{ asset("uploads/storage/img/userslogo/$user->photo")}}" width="250" height="250" alt="" alt="profile" />
            </a>
            @else
            <a href="" data-toggle="modal" data-target="#ModalLogo">
              <img src="{{ asset("uploads/storage/img/default/noimage.png")}}" width="250" height="200" class="" style="opacity: .8">
            </a>
            @endif
        </div>
        <div class="col-4">
            <p style="margin-top: 50px;">user_id: {{$user->id}}</p>
            <p>Ник: {{$user->	name}}</p>
        </div>
    </div>

    <h3>Общие</h3>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">mail</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Статус</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="@if($user->status != null) Бан  @endif">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Команды</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->fio}}">
        </div>
    </div>
    @if($user->bans->isNotEmpty())
        <h3>Бан</h3>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form">Даты банов</label>
            <div class="col-sm-4">
                @foreach($user->bans as $ban)
              
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Carbon\Carbon::parse($ban->date)->format('d.m.Y')}}">
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Причины банов</label>
            <div class="col-sm-4">
                @foreach($user->bans as $ban)
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$ban->description}}">
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Админ</label>
            <div class="col-sm-4">
                @foreach($user->bans as $ban)
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$ban->user->name}}">
                @endforeach
            </div>
        </div>
    @endif

    <h3>Верификация</h3>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Верификация</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="
               @if($user->verification == 'verified')
                    вер
                @elseif($user->verification == 'rejected')
                    откл
                @elseif($user->verification == 'on_check')
                    На проверке
                @endif
            ">
        </div>
    </div>
{{--    @dd($log_rejected)--}}
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Причины отказов</label>
        <div class="col-sm-4">
            @if($user->verifications->where('status', '0')->count() > 0)
                @foreach($user->verifications->where('status', '0') as $item)
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$item->description}}">
                @endforeach
            @else
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="-">
            @endif
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Дата верификации</label>
      <div class="col-sm-4">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="
        @if($user->verifications->where('status', 1)->count() > 0 )
           @foreach($user->verifications->where('status', 1) as $item)
           {{$item->date}}
           @endforeach
        @endif">
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Документы</label>
        <div class="col-sm-4">
        @if($user->doc_photo !=null && $user->doc_photo2 !=null)
            <a id="myBtn" href="#" data-toggle="modal" data-target="#ModalPhoto">Просмотр докуметов</a></br>
        @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Админ верификации</label>
        <div class="col-sm-4">
        @if($user->verifications->where('status', 1)->count() > 0)
            @foreach($user->verifications->where('status', 1) as $item)
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$item->moder_id}}">
            @endforeach
          @endif
      </div>
    </div>

    <a id="myBtn" href="#" data-toggle="modal" data-target="#ModalGameId"><h3>Игровой профиль</h3></a>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Ник</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->nickname}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Игровой ID</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->game_id}}">
        </div>
    </div>

    <h3>Персональная информация</h3>
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ФИО</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->fio}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Дата рождения</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Carbon\Carbon::parse($user->bdate)->format('d.m.Y')}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Страна / Город</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->country}} / {{$user->city}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Телефон</label>
        <div class="col-sm-4">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->phone}}">
        </div>
    </div>

    @if($user->doc_photo !=null && $user->doc_photo2 !=null && $user->verification =='on_check')
    <a type="button" class="btn btn-success" href="{{ route('verified', $user->id) }}" class="message" data-title="Подтвердить">Подтвердить</a>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalRejected">
      Отклонить
    </button>
    @endif
  </div>

<div class="modal fade" id="ModalRejected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Сообщение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('rejected', $user->id)}}">
                <div class="modal-body">
                    @csrf
                    <textarea name="description" id="" cols="50" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="btn" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{ asset("uploads/storage/img/verification/$user->doc_photo")}}" width="400" height="350" class="" style="opacity: .8">
        <img src="{{ asset("uploads/storage/img/verification/$user->doc_photo2")}}" width="400" height="350" class="img2" style="opacity: .8">
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalGameId" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <hr style="background-color: orange">
        <h3 class="text-center">Логи</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Дата</th>
                <th scope="col">С</th>
                <th scope="col">На</th>
            </tr>
            </thead>
            <tbody>

        @if($log_gameid != null)
            @foreach($log_gameid as $item)
                <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{Carbon\Carbon::parse($item->date)->format('d.m.Y')}}</td>
                    <td> {{$item->oldvalue}} </td>
                    <td> {{$item->newvalue}} </td>
                    <td>
                       
                    </td>
                </tr>
            @endforeach
         @else
         <h3>нету логов</h3>   
        @endif
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
