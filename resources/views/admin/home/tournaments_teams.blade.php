@extends('admin.admin_layout')

@section('content')
@if($teams != "")
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Команда</th>
      

    </tr>
  </thead>
  <tbody>
       <?$i=0;?>
      @foreach($teams as $team)
   
    <tr>
      <td scope="row"><?echo ++$i;?></td>
      <td scope="row">{{$team->name}}</td>
   </tr>
    @endforeach
  </tbody>
</table>
@else 
<h4>Нет команд</h4>
@endif  
@endsection