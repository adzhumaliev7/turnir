@extends('admin.admin_layout')

@section('content')
<div style="margin-left:100px;">

        @if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<form method="POST" action="{{route('store_tournament')}}  " enctype="multipart/form-data">
     @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Название турнира</label>
      <input type="text" name="name" class="form-control" id="" placeholder="Название турнира">
         @error('name')
             <div class="alert alert-danger">Ввнедите название турнира</div>
           @enderror
    </div>
      <div class="form-group col-md-4">
      <label for="inputPassword4">Формат</label>
      <input type="text" class="form-control" name="format" id="" placeholder="Формат">
         @error('format')
             <div class="alert alert-danger">Введите формат</div>
           @enderror
    </div>
</div>
 <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Страна</label>
      <input type="text" class="form-control" name="country" id="" placeholder="Страна">
         @error('country')
             <div class="alert alert-danger">Выберите страну</div>
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
             <div class="alert alert-danger">Допустимые страны</div>
           @enderror
    </div>

  </div>
  <div class="form-group col-md-4">
      <label for="inputPassword4">Добавить обложку</label>
       <input class="input-footer " name="file_label" placeholder="Обложка" type="file">

         @error('file_label')
             <div class="alert alert-danger">Загрузите фотографию</div>
           @enderror

    </div>
 <div class="form-group col-md-10">
      <label for="inputPassword4">Описание турнира</label>
      <textarea  class="form-control " name="description" id="ckeditor" placeholder="Описание турнира"></textarea>
         @error('	description')
             <div class="alert alert-danger">Введите описание турнира</div>
           @enderror
    </div>

     <h4>Основная информация</h4>
     <div class="form-row">

        <div class="form-group col-md-4">
            <label for="inputPassword4">Дата начала регистрации</label>
            <input type="text" id="start_reg" name="start_reg" class="form-control @error('start_reg') is-invalid @enderror" placeholder="Начало регистрации">
            @error('start_reg')
               <div class="alert alert-danger">Введите дату начала регистрации</div>
            @enderror
        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Дата завершеня регистрации</label>
            <input type="text" id="end_reg" name="end_reg" class="form-control @error('end_reg') is-invalid @enderror" placeholder="Завершение регистрации">
            @error('end_reg')
                <div class="alert alert-danger">Введите дату завершение регистрации</div>
            @enderror
        </div>

    </div>
  <div class="form-row">


</div>
  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Кол-во слотов</label>
      <input type="text" class="form-control" name="slot_kolvo" id="" placeholder="Кол-во слотов">
         @error('slot_kolvo')
             <div class="alert alert-danger">Введите максимальное количество участников</div>
           @enderror
    </div>

  </div>
  <h4>Этапы</h4>
 <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputPassword4">Дата начала турнира</label>
       <input type="text" class="form-control @error('tournament_start') is-invalid @enderror" name="tournament_start" id="" placeholder="Дата начала турнира">
         @error('tournament_start')
             <div class="alert alert-danger">Введите дату старта турнира</div>
           @enderror
    </div>
 
   <div class="form-group col-md-4">
      <label for="inputPassword4">Призовой фонд</label>
      <input type="text" class="form-control" name="price" id="" placeholder="100$">
         @error('price')
             <div class="alert alert-danger">Введите призовой фонд</div>
           @enderror
      </div>

  </div>
 <h4>Правила</h4>
 <div class="form-row">
   <div class="form-group col-md-10">
      <label for="inputPassword4">Правила</label>
      <textarea  class="form-control " name="rule" id="ckeditor2" placeholder="Правила"></textarea>
         @error('rule')
             <div class="alert alert-danger">Введите правила турнира</div>
           @enderror
    </div>
  </div>

 <div class="form-row">
   <div class="form-group col-md-10">
      <label for="inputPassword4">Мета - описание</label>
      <textarea  class="form-control " name="meta" id="" placeholder="Введите описание для индексации"></textarea>
         @error('meta')
             <div class="alert alert-danger">Введите описание для индексации</div>
           @enderror
    </div>
  </div>


   <input type="submit" class="btn btn-primary" name="submit" value="save"></input>
   <input type="submit" class="btn btn-danger" name="submit" value="draft"></input>
</form>

</div>
    @if(Session::has('flash_meassage'))
                  <div class="alert alert-success">{{Session::get('flash_meassage')}}</div>
                  @endif
@endsection
