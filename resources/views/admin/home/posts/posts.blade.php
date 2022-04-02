@extends('admin.admin_layout')

@section('content')

<div class="container">
@if(Session::has('flash_meassage'))
        <div class="alert alert-success" >{{Session::get('flash_meassage')}}</div>
@endif
  <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class =" navbar navbar-toggleable-md nvabar-light bg-faded">
            <a href="{{route('admin.posts.create')}}" type="button" class="btn btn-success create_p">Добавить новость</a>
            </nav>
            <div class="card">
                <div class="card-body">
                <table class="table table-hover" >
                
                    @if($posts != null)
                      <h4>Новости</>  
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>Заголовок</th>
                        <th>Автор</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       @foreach($posts as $post)
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->name}}</td>
                        <td><a href="{{route('admin.posts.edit', $post->id)}}" type="button" class="btn btn-primary">Реадактировать</a> 
                         <a href="{{route('admin.posts.delete', $post->id)}}" type="button" class="btn btn-danger">Удалить</a> </td>
                      </tr>
                      @endforeach
                      {{$posts->links()}}
                    @else 
                      <h4>Данных нет</h4>
                    </tbody>
                    @endif
                  </table>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection