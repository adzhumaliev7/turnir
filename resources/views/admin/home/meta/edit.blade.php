@extends('admin.admin_layout')
@section('title', 'Редактирование')

@section('content')



<div class="container">
<form action = "{{route('admin.meta.update' ,$meta->id)}}" method="POST" >
   @csrf

   <input name="_method" type="hidden" value="PUT">
   
  <div class="form-group">
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="" placeholder="Заголовок" value="{{$meta->page}}">
     @error('title')
             <div class="alert alert-danger">Введите заголовок</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Описание</label>
    <textarea  name="text" class="form-control " id="" value="">{{$meta->text}}</textarea>
     @error('text')
             <div class="alert alert-danger">Введите текст поста</div>
     @enderror
  </div>
   <button type="submit" class="btn btn-primary">Сохранить</button>

</form>
</div> 
  @endsection