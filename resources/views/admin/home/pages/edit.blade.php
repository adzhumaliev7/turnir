@extends('admin.admin_layout')
@section('title', 'Редактирование')

@section('content')



<div class="container">
<form action = "{{route('admin.pages.update' ,$page_id)}}" method="POST" >
   @csrf


   <div class="form-group">
    <label for="exampleFormControlInput1">URL</label>
    <input type="text" name="page" class="form-control" id=""  value="{{$page->title}}">
     @error('page')
             <div class="alert alert-danger">Введите URL</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="ckeditor" placeholder="Заголовок" value="{{$page->title}}">
     @error('title')
             <div class="alert alert-danger">Введите заголовок</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Описание</label>
    <textarea  name="text" class="form-control rules" id="ckeditor" value="">{{$page->text}}</textarea>
     @error('description')
             <div class="alert alert-danger">Введите текст поста</div>
     @enderror
  </div>
   <button type="submit" class="btn btn-primary">Сохранить</button>

</form>
</div> 
  @endsection