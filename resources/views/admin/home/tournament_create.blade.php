@extends('admin.admin_layout')

@section('content') 
<div style="margin-left:100px;"> 
<form method="POST" action="{{route('create_tournament')}}  " enctype="multipart/form-data">
     @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Название турнира</label>
      <input type="text" name="name" class="form-control" id="" placeholder="Название турнира">
         @error('name')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
      <div class="form-group col-md-4">
      <label for="inputPassword4">Формат</label>
      <input type="text" class="form-control" name="format" id="" placeholder="Формат">
         @error('format')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
</div>
 <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Страна</label>
      <input type="text" class="form-control" name="country" id="" placeholder="Страна">
         @error('country')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Часовой пояс</label>
     <select name="timezone" id="">
      @foreach($timezones as $timezone)
      <option value="{{$timezone}}">{{$timezone}}</option>
      @endforeach
     </select>
         @error('timezone')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
  </div>
  
   <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Допустимые страны</label>
      <input type="text" class="form-control" name="countries" id="" placeholder="Допустимые страны">
         @error('countries')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
 <div class="form-group col-md-4">
      <label for="inputPassword4">Допустимый уровень игроков</label>
      <input type="text" class="form-control" name="	players_col" id="" placeholder="Допустимый уровень игроков">
         @error('	players_col')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
   
  </div>
  </div>
  <div class="form-group col-md-4">
      <label for="inputPassword4">Добавить обложку</label>
       <input class="input-footer " name="file_label" placeholder="Обложка" type="file">
     
         @error('	file_label')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
             
    </div>
 <div class="form-group col-md-8">
      <label for="inputPassword4">Описание турнира</label>
      <textarea  class="form-control" name="description" id="" placeholder="Описание турнира"></textarea>
         @error('	description')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>

     <h4>Основная информация</h4>
     <div class="form-row">

   <div class="form-group col-md-4">
    
      <label for="inputPassword4">Начало регистрации</label>
      <input type="date" class="form-control" name="start_reg" id="" placeholder="Начало регистрации">
         @error('start_reg')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
   <div class="form-group col-md-4">
      <label for="inputPassword4">Завершение регистрации</label>
      <input type="date" class="form-control" name="end_reg" id="" placeholder="Завершение регистрации">
         @error('end_reg')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
      </div>

  </div>
  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Кол-во слотов</label>
      <input type="text" class="form-control" name="slot_kolvo" id="" placeholder="Кол-во слотов">
         @error('slot_kolvo')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
   <div class="form-group col-md-4">
      <label for="inputPassword4">Лига</label>
      <input type="text" class="form-control" name="ligue" id="" placeholder="Лига">
         @error('ligue')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
      </div>
  </div>
 <h4>Правила</h4>
 <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Правила</label>
      <input type="text" class="form-control" name="rule" id="" placeholder="Правила">
         @error('rule')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
   <div class="form-group col-md-4">
      <label for="inputPassword4">Заголовок</label>
      <input type="text" class="form-control" name="header" id="" placeholder="Заголовок">
         @error('header')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
      </div>
  </div>
 <h4>Этапы</h4>
 <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Дата начала турнира</label>
      <input type="date" class="form-control" name="tournament_start" id="" placeholder="Дата начала турнира">
         @error('tournament_start')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
   <div class="form-group col-md-4">
      <label for="inputPassword4">Время турнира</label>
      <input type="time" class="form-control" name="games_time" id="" placeholder="Время турнира">
         @error('games_time')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
      </div>
   <div class="form-group col-md-4">
      <label for="inputPassword4">Призовой фонд</label>
      <input type="text" class="form-control" name="price" id="" placeholder="100$">
         @error('price')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
      </div>

  </div>


   <button type="submit" class="btn btn-primary">Сохранить</button>
</form>

</div>
    @if(Session::has('flash_meassage'))
                  <div class="alert alert-success">{{Session::get('flash_meassage')}}</div>
                  @endif 
@endsection