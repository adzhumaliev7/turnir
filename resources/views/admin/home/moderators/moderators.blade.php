@extends('admin.admin_layout')
@section('title', 'Модераторы')

@section('content')

<div class="container">
<a href="{{route('create_moderators')}}" type="button" class="btn btn-success create_p">Добавить модератора</a>
@if($moderators != NULL)
    <h4>Модераторы</>
  <table class="table table-hover">
   
    

      <thead>
        <tr>

          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach($moderators as $moderator)
        <tr>


          <td>{{$moderator->email}}</td>

          <td> <a href="{{route('delete_moderators',$moderator->id)}}" type="button" class="btn btn-danger">Удалить</a></td>
          @endforeach
        </tr>

      
      </tbody>
     
  </table>
  {{$moderators->links()}}
  @else
        <h4>Данных нет</h4>
      @endif

</div>
@endsection