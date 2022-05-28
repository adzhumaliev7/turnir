@extends('layouts.layout')
@section('title', 'Пользовательское соглашение')
@section('content')

<div class="header-pubg__bg-2">
  
  @include('main.inc.nav_header')
</div>

<div class="main">
  <div class="container">

  <div class="info-help">
					<div>
						
						<p class="help__title" style="margin-top:35px;">{{$page->title}}</p>
						<p class="help__text info-help__text">
						{!!$page->text!!}
						</p>
					</div>
                  
				
	</div>


  </div>
</div>

    @endsection