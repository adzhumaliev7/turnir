@extends('admin.admin_layout')
@section('title', 'Редактирование')

@section('content')



<div class="container">
<form action = "{{route('admin.help.update' ,$post_id)}}" method="POST" >
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
	
    <input type="text" name=""  class="form-control " value="{{$posts->admin->name ?? ''}}" readonly >

  </div>

</div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Описание</label>
    <textarea  name="text" class="form-control " id="ckeditor" value="">{{$posts->text}}</textarea>
     @error('description')
             <div class="alert alert-danger">Введите текст поста</div>
     @enderror
  </div>
   <button type="submit" class="btn btn-primary">Сохранить</button>

</form>
</div> 
  @endsection