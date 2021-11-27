<style>
    .modal {
  display: none; /* Скрыто по умолчанию */
  position: fixed; /* Оставаться на месте */
  z-index: 1; /* Сидеть на вершине */
  padding-top: 100px; /* Расположение коробки */
  margin-left:250px;
  left: 0;
  top: 0;
   width: 100%;
  height: 100%;
  overflow: auto; /* Включите прокрутку, если это необходимо */
  background-color: rgb(0,0,0); /* Цвет запасной вариант  */
  background-color: rgba(0,0,0,0.4); /*Черный с непрозрачностью */
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
</style>

@extends('admin.admin_layout')

@section('content')
 @foreach($users as $user)
<?if($user->verification=="on_check"){
  echo '<h3>Не проверен</h3>';
}else{
  echo  '<h3>Проверен</h3>';
}
?>
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
   
      <td><a id="myBtn" href="#">Просмотр докуметов</a></td>
     
      <td>{{$user->phone}}</td>
      <td>{{$user->fio}}</td>
      <td>{{$user->login}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->country}}</td>
      <td>{{$user->city}}</td>
      <td>{{$user->bdate}}</td>
      <td>{{$user->nickname}}</td>
      <td>{{$user->game_id}}</td>
      <td><a  href="{{ route('verified', $user->id) }}" class="">&#10004;</a>
     <a  href="/admin_panel/users_card/{{$user->id}}" class="">&#10006;</a></td>
    </tr>
    @endforeach
  </tbody>
</table>

  <div id="myModal" class="modal">

  <!-- Модальное содержание -->
  <div class="modal-content">
       <span class="close">&times;</span>  
       <div>
      <img src="{{ asset("uploads/storage/img/$user->doc_photo")}}"  width="700" height="450" class="" style="opacity: .8">
      <img src="{{ asset("uploads/storage/img/$user->doc_photo2")}}"  width="700" height="450" class="img2" style="opacity: .8">
      </div>
    </div>
</div>    

   
  
@endsection

