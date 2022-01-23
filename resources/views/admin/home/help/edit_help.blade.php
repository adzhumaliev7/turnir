@extends('admin.admin_layout')
@section('title', 'Редактировать раздел помощи')

@section('content')



<div class="container">
     @foreach($help as $hel)
<form action = "{{route('edit_help_save', $hel->id)}}"  method="POST">
  @csrf

  <div class="form-group">
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"value="{{$hel->title}}">
     @error('title')
             <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Описание</label>
    <textarea  name="description" class="form-control" id="exampleFormControlInput1" placeholder="Описание">{{$hel->description}}</textarea>
     @error('description')
             <div class="alert alert-danger">{{$message}}</div>
     @enderror
  </div>
  
  </div>
  @endforeach
   <button type="submit" class="btn btn-primary">Save</button>
</form>
</div> 
  @endsection