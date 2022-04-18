@extends('layouts.layout')
@section('title', 'Новости')
@section('content')

<div class="header-pubg__bg-2">

  @include('main.inc.nav_header')
</div>

<div class="main">
  <div class="container">

 
  <div class="info-help">
					<div>
						
						<p class="help__title" style="margin-top:35px;">Новая версия PUBG MOBILE</p>
						<p class="help__text info-help__text">
						{!!$post->text!!}
						</p>
					</div>
                    <div class=" d-flex" style="float: right;">
							<div class="help__avatar d-flex">
								
								<p class="help__avatar__p">  {{$post->admin->name}}</p>
							</div>
							<p class="help__avatar__time">{{Carbon\Carbon::parse($post->date)->format('d-m-Y')}}</p>
						</div>
				
	</div>
  </div>
</div>

    @endsection