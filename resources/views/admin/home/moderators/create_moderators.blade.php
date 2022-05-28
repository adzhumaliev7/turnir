@extends('admin.admin_layout')
@section('title', 'Создать модератора')

@section('content')



<div class="container">
<form action = "{{route('save_moderator')}}" >
   
  <div class="form-group">
    <label for="exampleFormControlInput1">email</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email">
     @error('email')
             <div class="alert alert-danger">Такой email уже занят</div>
    @enderror
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">nickname</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Имя ">
     @error('nickname')
             <div class="alert alert-danger">Такой email уже занят</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Пароль</label>
    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Пароль">
     @error('password')
             <div class="alert alert-danger">{{$message}}</div>
     @enderror
  </div>
   <button type="submit" class="btn btn-primary">Save</button>
</form>
</div> 
  @endsection