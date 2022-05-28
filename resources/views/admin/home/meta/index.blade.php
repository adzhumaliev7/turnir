@extends('admin.admin_layout')

@section('content')

<div class="container">
@if(Session::has('flash_meassage'))
        <div class="alert alert-success" >{{Session::get('flash_meassage')}}</div>
@endif
  <div class="row justify-content-center">
        <div class="col-md-12">
        <nav class =" navbar navbar-toggleable-md nvabar-light bg-faded">
          
            </nav>
            <div class="card">
                <div class="card-body">
                <table class="table table-hover" >
                
                  
                      <h4>Описание </>  
                    <thead>
                      <tr> 
                        <th>#</th>
                      
                        <th>Страница</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       @foreach($metas as $meta)
                        <td>{{$meta->id}}</td>
                        <td>{{$meta->page}}</td>
                      
                    
                        <td><a href="{{route('admin.meta.edit', $meta->id)}}" type="button" class="btn btn-primary">Реадактировать</a> 
                      
                      </tr>
                      @endforeach
                  
                
                    </tbody>
                 
                  </table>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection