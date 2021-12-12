@extends('admin.admin_layout')

@section('content')
@if($users != "")
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
   
      <th scope="col">Почта</th>
      <th scope="col">Статус</th>
     
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      @foreach($users as $user)

    <tr>
      <td scope="row">{{$user->id}}</td>
    
      
      <td>{{$user->email}}</td>
      <td>@if($user->role_id == 1)Пользователь 
           @elseif($user->role_id == 2) Админ
           @else Модератор
         @endif
        </td>
    
    
      <td><a href="{{route('create_moderators', $user->id)}}" type="button" class="btn btn-primary">Сделать модератором</a>  <a type="button" class="btn btn-danger">Убрать модератора</a> </td>
    
    </tr>
    @endforeach
  </tbody>
</table>
@else 
<h4>Нет данных</h4>
@endif  
@endsection