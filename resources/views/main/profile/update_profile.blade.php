<?php
              function hideEmail($email) {
                $mail_parts = explode("@", $email);
                $length = strlen($mail_parts[0]);
            
                if($length <= 4 & $length > 1)
                {
                    $show = 1;
                    }else{
                    $show = floor($length/2);       
                }
            
                $hide = $length - $show;
                $replace = str_repeat("*", $hide);
            
                return substr_replace ( $mail_parts[0] , $replace , $show, $hide ) . "@" . substr_replace($mail_parts[1], "*******", 0, 15);  
            }
             ?>
<form method="POST" action="{{route('update_profile')}}" enctype="multipart/form-data" <?= $disabled; ?>>
            @csrf
        
      
            <h2 class="title letter-spacing--none indent--row">
             Основная информация
            </h2>

            <div class="row mt-4">
              <div class="col-lg-6">
                <input name="name"  placeholder="*Ник" type="text" class="form-control  subtitle  " id="" value="Ник: {{$user->name}}" readonly>
                @error('name')
                <div class="alert alert-danger">Введите логин</div>
                @enderror
              </div>
              <div class="col-lg-6">
                <input name="" placeholder="Email" readonly type="text" class="form-control  subtitle " id="" value="Почта: <? echo hideEmail($user->email);?>" readonly>
            
                @error('email')
                <div class="alert alert-danger">Такой email уже занят</div>
                @enderror
              </div>
            </div>
  
            <div class="row mt-4">
              <div class="col-lg-6">
              <input name="country" placeholder="" type="tel" class="form-control  subtitle fw-normal " id="" value="Страна: {{$user->country}}" readonly>
              </div>
              <div class="col-lg-6">
                <input name="bdate" placeholder="Дата рождения" type="date" class="form-control  subtitle " id="" value="{{$user->bdate}}" readonly>
              </div>
            </div>
          
            <h2 class="title letter-spacing--none indent--row">
              Игровой профиль PUBG MOBILE
            </h2>
            <div class="row">
              <div class="col-lg">
                <input placeholder="Nick name" name="nickname" type="text" class="form-control  subtitle  " id="" value="Игровой ник: {{$user->nickname}}" readonly>
              </div>
              <div class="col-lg">
                <input placeholder="ID игрока в PUBG Mobile" type="text" name="game_id" class="form-control  subtitle  " id="" value="Игровой ID: {{$user->game_id}}" readonly>
             
                @error('login')
                <div class="alert alert-danger">Игровой id уже занят</div>
                @enderror
              </div>
            </div>
	     <h2 class="title letter-spacing--none indent--row">
             Персональная информация
            </h2>
            <div class="row mt-4">
              <div class="col-lg-6">
                <input name="phone" placeholder="Номер телефона" type="tel" class="form-control  subtitle" id="" value="Телефон: {{$user->phone}}" readonly>
                @error('phone')
                <div class="alert alert-danger">Введите номер телефона</div>
                @enderror
              </div>
              <div class="col-lg-6">
                <input name="fio" placeholder="Имя Фамилия" type="text" class="form-control  subtitle" id="" value="ФИО: {{$user->fio}}" readonly>
                @error('fio')
                <div class="alert alert-danger">Введите имя</div>
                @enderror
              </div>
            </div>
          
            @if($disabled == 'disabled')
          
            @else <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
            @endif
          </form>
