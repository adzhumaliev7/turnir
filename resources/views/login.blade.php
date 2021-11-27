<html>
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content ="{{ csrf_token() }}">
        <title>Форма</title>
       
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ asset("css/form.css") }}">
    </head>
<body> 

<div id="wrapper">
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
	
<form name="login-form" class="login-form" method="post" action="{{route('user.login')}}">
 @csrf
    <div class="header">
		<h1>Авторизация</h1>
		<span>Введите ваши регистрационные данные для входа в ваш личный кабинет. </span>
    </div>

    <div class="content">
		 <input class="form-control" id="email" name="email" type="text" value="" placeholder="Email">
           @error('email')
             <div class="alert alert-danger">{{$message}}</div>
           @enderror
		 <input class="form-control" id="password" name="password" type="text" value="" placeholder="password">
          @error('password')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div class="footer">
		<input type="submit" name="submit" value="ВОЙТИ" class="button" />
</form>
		 
    </div>
 <a name="sendMe" value="1" href="{{route('user.registration')}}"><input type="submit" name="submit" value="Регистрация" class="register" /></a>
</div>

</body>

</html>

<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>