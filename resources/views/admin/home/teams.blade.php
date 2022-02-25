@extends('admin.admin_layout')

@section('content')
@if($teams != null)
<div class="container">
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
        <td scope="row">{{$loop->index+1}}</td>
        <td>{{$team->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$teams->links()}}
  @else
  <h4>Нет данных</h4>
  @endif
</div>
@endsection