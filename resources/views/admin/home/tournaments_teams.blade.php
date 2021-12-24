@extends('admin.admin_layout')

@section('content')
@if($teams != "")
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Команда</th>
      <th scope="col">Участники</th>
      <th scope="col"></th>
      

    </tr>
  </thead>
  <tbody>
       <?$i=0;?>
      @foreach($teams as $team)
   
    <tr>
      <td scope="row"><?echo ++$i;?></td>
      <td scope="row">{{$team->name}}</td>
      <td scope="row">
        <select name="" id="">
          @foreach($members as $member)
            <option value="">{{$member->login}}</option>

          @endforeach
        </select>  

      </td>
      <td scope="row"> 
        <a href="" type="button" class="btn btn-success">Принять</a>
        <a href="" type="button" class="btn btn-danger">Отклонить</a>
    </td>
   </tr>
    @endforeach
  </tbody>
</table>
@else 
<h4>Нет команд</h4>
@endif  
@endsection