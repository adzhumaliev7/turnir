@extends('admin.admin_layout')
@section('title', 'Модераторы')

@section('content')


<div class="container">
<form action = "{{route('store_password', $id)}}"  method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for=""></label>
    <input type="text" name="password" class="form-control" id="" placeholder="Введите название категогии">
     @error('password')
             <div class="alert alert-danger">Введите новый пароль</div>
    @enderror
  </div>
   <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
</div> 

@endsection