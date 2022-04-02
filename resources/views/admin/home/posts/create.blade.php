@extends('admin.admin_layout')
@section('title', 'Создать новость')

@section('content')



<div class="container">
<form action = "{{route('admin.posts.store')}}" method="POST" >
   @csrf
   
  <div class="form-group">
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок">
     @error('title')
             <div class="alert alert-danger">Введите заголовок</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Дата</label>
    <input type="text" name="date"  class="form-control @error('date') is-invalid @enderror" placeholder="Введите дату">
     @error('date_post')
             <div class="alert alert-danger">Введите заголовок</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Описание</label>
    <textarea  name="text" class="form-control rules" id="exampleFormControlInput1" placeholder="Описание"></textarea>
     @error('description')
             <div class="alert alert-danger">Введите текст поста</div>
     @enderror
  </div>
   <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
</div> 
  @endsection