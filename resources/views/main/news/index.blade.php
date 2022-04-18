@extends('layouts.layout')
@section('title', 'Новости')
@section('content')

<div class="header-pubg__bg-2">
  
  @include('main.inc.nav_header')
</div>

<div class="main">
  <div class="container">

  <h1 class="help__h1">Новости</h1>

            @foreach($posts as $post)
				<div class="help d-flex">
					<div class="img_news" >
					<img src="{{ asset("uploads/storage/img/posts/$post->label")}}"  value="{{$post->label}}" width="300" height="200" class="" style="opacity: .8">
					</div>
					<div class="help__container">
						<p> 
							<a href="{{route('news.show', $post->id)}}" class="help__title"> 
								{{$post->title}}
							</a>
						</p>
						<div class=" d-flex">
							<div class="help__avatar d-flex">
								
								<p class="help__avatar__p">{{$post->name}}</p>
							</div>
							<p class="help__avatar__time">{{Carbon\Carbon::parse($post->date)->format('d-m-Y')}}</p>
						</div>
                        <a href="{{route('news.show', $post->id)}}" class="help__text_link"> 
						<p class="help__text">

							{!!$post->preview!!}
                        <?/*  $string = strip_tags($post->text);
                        	    $string = substr($string, 0, 300);
	                            $string = rtrim($string, "!,.-");
                                $string = substr($string, 0, strrpos($string, ' '));
                                echo $string."… "; */
                      ?>
                      
						</p>
                        </a>
					</div>
				</div>
			    @endforeach

  </div>
</div>

    @endsection