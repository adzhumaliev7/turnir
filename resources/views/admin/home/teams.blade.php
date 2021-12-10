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
      @foreach($teams as $team)

    <tr>
      <td scope="row">{{$team->id}}</td>
      <td>{{$team->name}}</td>
      
    
    </tr>
    @endforeach
  </tbody>
</table>
@else 
<h4>Нет данных</h4>
@endif
@endsection