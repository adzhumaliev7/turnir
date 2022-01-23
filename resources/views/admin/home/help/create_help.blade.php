@extends('admin.admin_layout')
@section('title', 'Создать раздел помощи')

@section('content')



<div class="container">
<form action = "{{route('save_help')}}" >
   
  <div class="form-group">
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="title">
     @error('title')
             <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Описание</label>
    <textarea  name="description" class="form-control" id="exampleFormControlInput1" placeholder="Описание"></textarea>
     @error('description')
             <div class="alert alert-danger">{{$message}}</div>
     @enderror
  </div>
   <button type="submit" class="btn btn-primary">Save</button>
</form>
</div> 
  @endsection