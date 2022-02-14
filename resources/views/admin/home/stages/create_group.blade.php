@extends('admin.admin_layout')
@section('title', 'Создать этап')

@section('content')



<div class="container">
  @foreach($tournaments as $tournament)
    <h3>Создание группы для - {{$tournament->name}}</h3>
  @endforeach
<form method="POST" action = "{{route('create_group', $turnir_id)}}" >
   @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Номер этапа</label>
    <input type="text" name="stage_number" class="form-control" id="exampleFormControlInput1" placeholder="">
     @error('stage_number')
             <div class="alert alert-danger">Введите номер этапа</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Название этапа</label>
    <input type="text" name="stage_name" class="form-control" id="exampleFormControlInput1" placeholder="">
     @error('stage_name')
             <div class="alert alert-danger">Введите Название этапа</div>
     @enderror
  </div>
   <button type="submit" class="btn btn-primary">Save</button>
</form>
</div> 
  @endsection