@extends('admin.admin_layout')
@section('title', 'Создать раздел помощи')

@section('content')



<div class="container">

     <form action="{{route('admin.help.filter.store')}}" method="POST">
        @csrf
        <div class="tab-content">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Заголовок</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><input type="text" name="data[{{$post->id }}][post_id]" value="{{$post->post_id}}"></td>
                       
                        <td>{{$post->title}}</td>
                    
                    </tr>
                    @endforeach
                    
                    </table>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
    



</div>

  @endsection