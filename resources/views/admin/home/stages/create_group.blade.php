@extends('admin.admin_layout')
@section('title', 'Создать группу')

@section('content')



<div class="container">
  @foreach($tournaments as $tournament)
    <h3>Создание группы для - {{$tournament->name}}</h3>
  @endforeach
<form method="POST" action = "{{route('create_group', [$turnir_id, $stage_id])}}" >
   @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Номер Группы</label>
    <input type="text" name="group_number" class="form-control" id="exampleFormControlInput1" placeholder="">
     @error('group_number')
             <div class="alert alert-danger">Введите номер группы</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Название группы</label>
    <input type="text" name="group_name" class="form-control" id="exampleFormControlInput1" placeholder="">
     @error('stage_name')
             <div class="alert alert-danger">Введите Название группы</div>
     @enderror
  </div>

    @foreach($teams as $team)
        {{$team->name}}<input type="checkbox" name="teams[]" class="form" id="" placeholder="" value="{{$team->id}}"></br>
    @endforeach 
  
   <button type="submit" class="btn btn-primary">Save</button>
</form>
</div> 
  @endsection