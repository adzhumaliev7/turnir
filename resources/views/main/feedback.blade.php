@extends('layouts.layout')
@section('title', 'Обратная связь')
@section('content')

<div class="header-pubg__bg-2">
  
    @include('main.inc.nav_header')
</div>

<div class="main">
  <!-- first item - 1 -->
  <div class="container">

    <!-- first item - 1 -->
    <div class="container">
      @if(Session::has('flash_meassage'))
      <div class="alert alert-success">{{Session::get('flash_meassage')}}</div>
      @endif
      <form method="POST" action="{{route('save_feedback')}}" enctype="multipart/form-data">
        @csrf
        <h2 class="title letter-spacing--none my-2"> ФИО </h2>
        <div class="col-lg-6">

          <input name="fio" placeholder="ФИО" type="text" class="form-control input__profile subtitle fw-normal" id="">
          @error('fio')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h2 class="title letter-spacing--none my-2"> Телефон </h2>
        <div class="col-lg-6">

          <input name="phone" placeholder="Телефон" type="text" class="form-control input__profile subtitle fw-normal" id="">
          @error('phone')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h2 class="title letter-spacing--none my-2"> Почта </h2>
        <div class="col-lg-6">

          <input name="email" placeholder="email" type="text" class="form-control input__profile subtitle fw-normal" id="">
          @error('email')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>
        <h2 class="title letter-spacing--none my-2"> Сообщение </h2>
        <div class="col-lg-6">

         <textarea name="description" placeholder="Текст сообщения" class="form-control input__profile subtitle fw-normal" id="" rows="10" cols="45"></textarea>
          @error('description')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
        </div>



        <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Отправить</button>
      </form>

    </div>
  </div>
</div>

    @endsection