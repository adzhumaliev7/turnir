@extends('admin.admin_layout')

@section('content')

<div class="container">
@if(Session::has('flash_meassage'))
        <div class="alert alert-success" >{{Session::get('flash_meassage')}}</div>
@endif
  <div class="row justify-content-center">
        <div class="col-md-12">
        <nav class =" navbar navbar-toggleable-md nvabar-light bg-faded">
            <a href="{{route('admin.pages.create')}}" type="button" class="btn btn-success create_p">Добавить страницу</a>
            </nav>
            <div class="card">
                <div class="card-body">
                <table class="table table-hover" >
                
                    @if($pages != null)
                      <h4>Новости</>  
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>url</th>
                        <th>Страница</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       @foreach($pages as $page)
                        <td>{{$page->id}}</td>
                        <td>{{$page->page}}</td>
                        <td>{{$page->title}}</td>
                    
                        <td><a href="{{route('admin.pages.edit', $page->id)}}" type="button" class="btn btn-primary">Реадактировать</a> 
                        <a href="{{route('admin.pages.delete', $page->id)}}" type="button" class="btn btn-danger">Удалить</a> 
                      </tr>
                      @endforeach
                  
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