@extends('admin.admin_layout')
@section('title', 'Редактирование')

@section('content')



<div class="container">
<form action = "{{route('admin.posts.update' ,$post_id)}}" method="POST"  enctype="multipart/form-data">
   @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок" value="{{$posts->title}}">
     @error('title')
             <div class="alert alert-danger">Введите заголовок</div>
    @enderror
  </div>
  
  <div class="form-row">

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1">Дата</label>
    <input type="text" name="date"  class="form-control @error('date_post') is-invalid @enderror" value="{{Carbon\Carbon::parse($posts->date)->format('d.m.Y')}}" >
     @error('date_post')
             <div class="alert alert-danger">Введите дату</div>
    @enderror
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1">Автор</label>
    <input type="text" name=""  class="form-control " value="{{$posts->admin->name}}" readonly >
  </div>
</div>
<div class="form-group">
      <label for="inputPassword4">Обложка</label>
      @if($posts->label != null)

      <img src="{{ asset("uploads/storage/img/posts/$posts->label")}}"  value="{{$posts->label}}" width="250" height="200" class="" style="opacity: .8">
      <input class="input-footer " name="label" placeholder="Обложка" type="file">
       @else
       <label for="inputPassword4">Добавить обложку</label>
       <input class="input-footer " name="label" placeholder="Обложка" type="file">
         @error('label')
             <div class="alert alert-danger">Загрузите фотографию</div>
           @enderror
          @endif
    </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Описание</label>
    <textarea  name="preview" class="form-control rules" id="ckeditor" value="">{{$posts->preview}}</textarea>
     @error('preview')
             <div class="alert alert-danger">Введите текст поста</div>
     @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Описание</label>
    <textarea  name="text" class="form-control rules" id="ckeditor2" value="">{{$posts->text}}</textarea>
     @error('text')
             <div class="alert alert-danger">Введите текст поста</div>
     @enderror
  </div>
   <button type="submit" class="btn btn-primary">Сохранить</button>

</form>
</div> 
  @endsection