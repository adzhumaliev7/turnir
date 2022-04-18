<style>
  details {


margin: 30px;
}
details span{

font-size: 2rem;
margin: 10px;
}
details summary span {
    background: url("../img/arrow_r.jpg") no-repeat scroll 0 0;
    margin-left: -20px;
    padding-left:20px;
}
details[open] summary span {
    background: url("../img/arrow_d.jpg") no-repeat scroll 0 0;
    margin-left: -20px;
    padding-left:20px;
}

</style>

@extends('layouts.layout')
@section('title', 'Помощь')
@section('content')

<div class="header-pubg__bg-2">

  @include('main.inc.nav_header')
</div>

<div class="main">
  <div class="container">

  <h1 class="help__h1">Помощь</h1>
@if($help != null)
  @foreach($help as $item)
    <details>
    <summary><span>{{$item->title}}</span></summary>
  
    <span>{!!$item->text!!}</span>
    </details>
  @endforeach
@endif
  </div>
  
</div>
<div class="container">
  <h1 class="help__h1">Есть вопросы</h1>
  <div class="text_a">
  <a href="{{route('feedback')}}"   class="btn  submit-btn btn--size btn--orange btn--margin">Задать вопрос</a>
  </div>
  </div>
    @endsection