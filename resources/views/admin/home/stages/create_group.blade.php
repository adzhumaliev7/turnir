@extends('admin.admin_layout')
@section('title', 'Создать группу')

@section('content')



<div class="container">
    <h3>Создание группы для - {{$tournament->name}}</h3>
<form method="POST" action = "{{route('create_group', [$turnir_id, $stage_id])}}" >
   @csrf
  <div class="form-group">
    <label for="exampleFormControlInput11">Номер Группы</label>
    <input type="text" name="group_number" class="form-control" id="exampleFormControlInput11" placeholder="">
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

{{--    @foreach($teams as $team)--}}

{{--        {{$team->team->name}}<input type="checkbox" name="teams[]" class="form" placeholder="" value="{{$team->team_id}}"></br>--}}
{{--    @endforeach--}}


    <div class="form-group col-6">
{{--        <label>Выбор играков для группы</label>--}}
        <div id="seclecter" class="demosdsdsd mb-3" style="">
            <select class="form-control"  multiple="multiple" name="teams[]" placeholder="Выберите доступных играков" >
                @foreach($teams as $team)
                    <option value="{{$team->team_id}}">{{$team->team->name}}</option>
                @endforeach
            </select>
        </div>
    </div>




   <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
  @endsection
