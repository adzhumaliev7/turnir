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

@if($users != null)
@foreach($users as $user)

@if($user->verification =='verified')
  <h3>Верифицирован</h3>
@elseif($user->verification =='rejected')
  <h3>Отклонен</h3>

@endif
@endforeach


   <div class="container">
 @foreach($users as $user)
 <div class="container">
  <div class="row">
    <div class="col-md-4">
       @if($user_photo != NULL)
            <a href=""  data-toggle="modal" data-target="#ModalLogo">
              <img class="header__img" src="{{ asset("uploads/storage/img/userslogo/$user_photo")}}" width="250" height="250" alt="" alt="profile" />
            </a>
 
           
            @else
           <a href=""  data-toggle="modal" data-target="#ModalLogo">
             <img src="{{ asset("uploads/storage/img/default/noimage.png")}}"  width="250" height="200" class="" style="opacity: .8">
              </a>
         
            @endif
    </div>
    <div class="col-md-8">
      <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">ФИО</label>
    <div class="col-sm-4">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->fio}}">
   
      </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
       <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
    </div>

  </div>
 <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Login</label>
    <div class="col-sm-4">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->login}}">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Дата рождения</label>
    <div class="col-sm-4">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->bdate}}">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Телефон</label>
    <div class="col-sm-4">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->phone}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Страна / Город</label>
    <div class="col-sm-4">
         <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->country}} / {{$user->city}}">
    </div>
  </div>
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
  @if($user->doc_photo !=null && $user->doc_photo2  !=null)
   <a id="myBtn" href="#" data-toggle="modal" data-target="#ModalPhoto">Просмотр докуметов</a></br>
  @if($user->verification =='on_check')
   
    </br>
    </br>
     <a type="button" class="btn btn-success" href="{{ route('verified', $user->id) }}" class="message" data-title="Подтвердить">Подтвердить</a>
      
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalRejected">
          Отклонить
        </button>
  @endif
@endif
    </div>
  </div>
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
  
    @endforeach


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
@else
<h3>Нет данных</h3>
@endif
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