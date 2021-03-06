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
@foreach($users as $user)

@if($user->verification =='verified')
  <h3>Верифицирован</h3>
@elseif($user->verification =='on_check')
  <h3>Ожидает верификации</h3>
@else
  <h3>Отклонен</h3>
@endif
@endforeach

<table class="table">
  <thead class="thead-light">
    <tr>

      <th scope="col">Документы</th>

      <th scope="col">Телефон</th>
      <th scope="col">ФИО</th>
      <th scope="col">login</th>
      <th scope="col">email</th>
      <th scope="col">Страна</th>
      <th scope="col">Город</th>
      <th scope="col">Дата рождения</th>
      <th scope="col">НИК</th>
      <th scope="col">Игровой ID</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>

    @foreach($users as $user)

    <tr>

      <td><a id="myBtn" href="#" data-toggle="modal" data-target="#ModalPhoto">Просмотр докуметов</a></td>

      <td>{{$user->phone}}</td>
      <td>{{$user->fio}}</td>
      <td>{{$user->login}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->country}}</td>
      <td>{{$user->city}}</td>
      <td>{{$user->bdate}}</td>
      <td>{{$user->nickname}}</td>
      <td>{{$user->game_id}}</td>
      <td><a href="{{ route('verified', $user->id) }}" class="message" data-title="Подтвердить">&#10004;</a>
        <!--  <a href="{{ route('rejected', $user->id) }}" class="message" data-title="Отконить">&#10006;</a> -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalRejected">
          Отклонить
        </button>
     
      
        <div class="modal fade" id="ModalRejected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Сообщение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form method="POST" action="{{route('rejected', $user->user_id)}}">
                  @csrf
                  <textarea name="text" id="" cols="50" rows="10"></textarea>

              </div>
              <div class="modal-footer">

                <button type="btn" class="btn btn-primary">Сохранить</button>
                </form>
             </div>
            </div>
           </div>  
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


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
<!-- 

<div id="myModal" class="modal2">
</div>

<div class="modal-content">
  <span class="close">&times;</span>
  <div>

  </div>
</div>
 -->



@endsection