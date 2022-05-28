@extends('admin.admin_layout')

@section('content')


<div class="container">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Почта</th>
        <th scope="col">Ник</th>
    
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)

      <tr>
        <td scope="row">{{$loop->index+1}}</td>
   
      
        <td>{{$user->email}}</td>
        <td>{{$user->name}}</td>
       
        <td><a href="{{route('activate', $user->id)}}" class="btn btn-success">Активировать</a>
        
        </td>
      </tr>
      @endforeach
    </tbody>
  
  </table>
  {{$users->links()}}
</div>
@endsection