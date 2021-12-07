@extends('admin.admin_layout')

@section('content')
<a  href="{{route('create_tournament')}}" class="btn btn-primary">Создать</a>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название турнира</th>
      <th scope="col">Страна</th>
      <th scope="col">Дата турнира</th>
  
    </tr>
  </thead>
  <tbody>
     
  @foreach($tournaments as $tournament)
    <tr>
      <td scope="row">{{$tournament->id}}</td>
      <td>{{$tournament->name}}</td>
      <td>{{$tournament->country}}</td>
      <td>{{$tournament->tournament_start}} {{$tournament->games_time}}</td>
   
    </tr>
  @endforeach
  </tbody>
</table>
@endsection