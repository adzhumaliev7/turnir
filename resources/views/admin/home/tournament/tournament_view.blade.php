@extends('admin.admin_layout')

@section('content')
<div style="margin-left:100px;">
<form method="POST" action="{{route('edit_tournament', $id)}}" enctype="multipart/form-data">
     @csrf
     @foreach($tournaments as $tournament)
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Название турнира</label>
      <input type="text" name="name" class="form-control" id="" placeholder="Название турнира" value="{{$tournament->name}}">
         @error('name')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>

      <div class="form-group col-md-4">
      <label for="inputPassword4">Формат</label>
      <input type="text" class="form-control" name="format" id="" placeholder="Формат" value="{{$tournament->format}}">
         @error('format')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
</div>
 <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Страна</label>
      <input type="text" class="form-control" name="country" id="" placeholder="Страна" value="{{$tournament->country}}">
         @error('country')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Часовой пояс</label>
      <input type="timezone" class="form-control" name="timezone" id="" placeholder="Часовой пояс" value="{{$tournament->timezone}}">
         @error('timezone')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
  </div>

   <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Допустимые страны</label>
      <input type="text" class="form-control" name="countries" id="" placeholder="Допустимые страны" value="{{$tournament->countries}}">
         @error('countries')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
 <div class="form-group col-md-4">
      <label for="inputPassword4">Допустимый уровень игроков</label>
      <input type="text" class="form-control" name="	players_col" id="" placeholder="Допустимый уровень игроков" value="{{$tournament->slot_kolvo}}">
         @error('	players_col')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror

  </div>
  </div>
  <div class="form-group col-md-4">
      <label for="inputPassword4">Обложка</label>
      @if($tournament->file_label != null)

      <img src="{{ asset("uploads/storage/adminimg/turnir_logo/$tournament->file_label")}}"  value="{{$tournament->file_label}}" width="250" height="200" class="" style="opacity: .8">

     <input class="input-footer " name="file_label" placeholder="Обложка" type="file">
       @else
       <label for="inputPassword4">Добавить обложку</label>
       <input class="input-footer " name="file_label" placeholder="Обложка" type="file">

         @error('file_label')
             <div class="alert alert-danger">Загрузите фотографию</div>
           @enderror

          @endif
    </div>
 <div class="form-group col-md-8">
      <label for="inputPassword4">Описание турнира</label>
      <textarea  class="form-control rules" name="description" id="" placeholder="Описание турнира">{{$tournament->description}}</textarea>
         @error('description')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>

     <h4>Основная информация</h4>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputPassword4">Дата начала регистрации</label>
            <input type="text" id="start_reg" name="start_reg" class="form-control @error('start_reg') is-invalid @enderror" placeholder="Начало регистрации" value="{{$tournament->start_reg}}">
            @error('start_reg')
            <div class="alert alert-danger">Введите дату начала регистрации</div>
            @enderror
        </div>

        <div class="form-group col-md-4">  
            <label for="inputPassword4">Дата завершеня регистрации</label>
            <input type="text" id="end_reg" name="end_reg" class="form-control @error('end_reg') is-invalid @enderror" placeholder="Завершение регистрации" value="{{$tournament->end_reg}}"">
            @error('end_reg')
            <div class="alert alert-danger">Введите дату завершение регистрации</div>
            @enderror
        </div>
    </div>

  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Кол-во слотов</label>
      <input type="text" class="form-control" name="slot_kolvo" id="" placeholder="Кол-во слотов"  value="{{$tournament->slot_kolvo}}">
         @error('slot_kolvo')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>

  </div>
  <h4>Этапы</h4>
 <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Дата начала турнира</label>
      <input type="date"  class="form-control @error('tournament_start') is-invalid @enderror"  name="tournament_start" id="" placeholder="Дата начала турнира" value="{{$tournament->tournament_start}}">
         @error('tournament_start')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
  

       <div class="form-group col-md-4">
      <label for="inputPassword4">Призовой фонд</label>
      <input type="text" class="form-control" name="price" id="" placeholder="100$" value="{{$tournament->price}}">
         @error('price')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
      </div>
  </div>
 <h4>Правила</h4>
 <div class="form-row">
   <div class="form-group col-md-10">
      <label for="inputPassword4">Правила</label>
      <textarea name="rule"  class ="rules" id="rules" placeholder="Правила" >{{$tournament->rule}}</textarea>
         @error('rule')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
  </div>

    @endforeach
   <button type="submit" class="btn btn-primary">Сохранить</button>
</form>

</div>
    @if(Session::has('flash_meassage'))
                  <div class="alert alert-success">{{Session::get('flash_meassage')}}</div>
                  @endif
@endsection
