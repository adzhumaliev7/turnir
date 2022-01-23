@extends('admin.admin_layout')

@section('content')
<div class="container">
  <a href="{{route('create_help')}}" class="btn btn-primary">Создать категорию помощь</a>
  <table class="table table-hover">

    @if($help != " ")
    <h4>Раздел помощи</>

      <thead>
        <tr>

          <th>Заголовок</th>
        </tr>
      </thead>
      <tbody>
        @foreach($help as $hel)
        <tr>


          <td>{{$hel->title}}</td>

          <td> <a href="{{route('edit_help', $hel->id)}}" type="button" class="btn btn-success">Редактировать</a> <a href="" type="button" class="btn btn-danger">Удалить</a></td>
          @endforeach
        </tr>

        @else
        <h4>Данных нет</h4>
      </tbody>
      @endif
  </table>
</div>
@endsection