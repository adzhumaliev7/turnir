@extends('layouts.layout')

@section('title', 'Команда')
@section('content')
<div class="header-pubg__bg-2">
@include('main.inc.nav_header')
</div>
<div class="main">
  <!-- first item - 1 -->

    <div class="container">

        <h2 class="title letter-spacing--none my-2"> Вы получили при в команду - {{$team}}</h2>

        @if($status == null)
        <a href="{{route('addmembe_apply', $id)}}" type="button" class="btn btn-primary" style="font-size:16px">Принять</a>
        <a type="button" href="{{route('main')}}"  class="btn btn-secondary" style="font-size:16px">Отклонить</a>
        @else 
        <h3>Вы не можете вступить в команду так как ваш аккаунт заблокирован</h3>
        @endif
    </div>
</div>




@endsection