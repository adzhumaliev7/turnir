@extends('admin.admin_layout')

@section('content')
@if($data != NULL)
<div class="container">
  <h3>Отклоненные</h3>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Команда</th>
        <th scope="col">Админ</th>
        <th scope="col">Описание</th>
        <th scope="col">Дата</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->admin}}</td>
        <td>{{$item->descriptions}}</td>
        <td>{{$item->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
  @else
  <h4>Нет данных</h4>
  @endif
</div>
@endsection