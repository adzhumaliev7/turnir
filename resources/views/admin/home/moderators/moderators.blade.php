@extends('admin.admin_layout')
@section('title', 'Модераторы')

@section('content')

<div class="container">
@if(Session::has('flash_meassage'))
      <div type="button" class="alert alert-success" style="font-size: 16px;">{{Session::get('flash_meassage')}}  
      <a type="button" class="close close_styles" data-dismiss="alert" aria-label="Close" >
            <span aria-hidden="true">&times;</span>  </a>
          </div>
      @endif
<a href="{{route('create_moderators')}}" type="button" class="btn btn-success create_p">Добавить модератора</a>
@if($moderators != NULL)
    <h4>Модераторы</>
  <table class="table table-hover">
   
    

      <thead>
        <tr>

          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($moderators as $moderator)
        <tr>


          <td>{{$moderator->email}}</td>

          <td> <a href="{{route('change_password',$moderator->id)}}" type="button" class="btn btn-success">Изменить пароль</a>
           <a href="{{route('delete_moderators',$moderator->id)}}" type="button" class="btn btn-danger">Удалить</a></td>
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