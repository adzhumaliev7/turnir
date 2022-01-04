@extends('admin.admin_layout')

@section('content')
  @if($feedbacks != NULL)
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ФИО</th>
      <th scope="col">Email</th>
      <th scope="col">phone</th>
      <th scope="col">Описание</th>
  
      
    </tr>
  </thead>
  <tbody>
      @foreach($feedbacks as $feedback)

    <tr>
  
      <td>{{$feedback->fio}}</td>
      <td>{{$feedback->email}}</td>
      <td>{{$feedback->phone}}</td>
      <td>{{$feedback->description}}</td>
      
    
    </tr>
    @endforeach
  </tbody>
</table>
@else 
<h4>Нет данных</h4>
@endif
@endsection