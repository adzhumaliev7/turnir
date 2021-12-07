@extends('admin.admin_layout')

@section('content') 
<div style="margin:20px;">
<form method="POST" action="{{route('create_tournament')}}">
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
      <label for="inputPassword4">Страна</label>
      <input type="text" class="form-control" name="country" id="" placeholder="Страна">
         @error('country')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Дата турнира</label>
      <input type="date" name="tournament_start" class="form-control" id="" placeholder="дата турнира">
         @error('tournament_start')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Время турнира</label>
      <input type="time" name="games_time" class="form-control" id="" placeholder="время">
         @error('games_time')
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