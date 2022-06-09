

<div class="row">
      @if($disabled == 'disabled' && $ban == '')
            <div class="alert alert-danger subtitle" >Во время проведения турнира редактирование недоступно</div>

       @elseif($disabled == 'disabled' && $ban == 'ban')
           <div class="alert alert-danger subtitle" >Во время бана редактирование недоступно</div>
        @endif
    <div class="col">
    <form method="POST" action="{{route('update_profile')}}" enctype="multipart/form-data" class="size_16">
    <fieldset <?echo $disabled;?>>
            @csrf
        
            <h2 class="title letter-spacing--none indent--row">
             Основная информация
            </h2>
           <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label">Логин</label>
               <div class="col-sm-5">
                 <input type="text" name="name"  class="form-control subtitle" id=""  value="{{$user->name}}">
                 @error('name')
                <div class="alert alert-danger">этот Логин уже уже занят</div>
                @enderror
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Email</label>
               <div class="col-sm-5">
     <input type="text" name="" class="form-control subtitle" readonly id="" placeholder="email"       value="<? echo hideEmail($user->email);?>" >
               </div>
             </div>
          
             <a class="btn  submit-btn  mt-4" data-toggle="modal" data-target="#changePassword">Изменить пароль</a>
             <h2 class="title letter-spacing--none indent--row">
            Игровой профиль
            </h2>
           <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label">Ник</label>
               <div class="col-sm-5">
                 <input type="text" name="nickname"  class="form-control subtitle" id="" value="{{$user->nickname}}">
				     @error('nickname')
                <div class="alert alert-danger">этот nickname уже занят</div>
                @enderror
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Игровой ID</label>
               <div class="col-sm-5">
                 <input type="text" name="game_id" class="form-control subtitle" id="" placeholder=""  value="{{$user->game_id}}">
                 <input type="hidden" name="old_game_id" class="form-control input__profile subtitle fw-normal" id="" value="{{$user->game_id}}">
				     @error('game_id')
                <div class="alert alert-danger">этот Game Id уже занят</div>
                @enderror
               </div>
             </div>
             <h2 class="title letter-spacing--none indent--row">
            Персональная информация
            </h2>
		 <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label">ФИО</label>
               <div class="col-sm-5">
                 <input type="text" name="fio"  class="form-control subtitle" id=""  value="{{$user->fio}}">
               </div>
             </div>
           <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label">Телефон</label>
               <div class="col-sm-5">
                 <input type="text" name="phone"  class="form-control subtitle" id="" value="{{$user->phone}}">
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Дата рождения</label>
               <div class="col-sm-5">
                 <input type="date" name="bdate" class="form-control subtitle"  id="" placeholder="email"  value="{{$user->bdate}}">
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Страна</label>
               <div class="col-sm-5">
               <select name="country" id="" style="font-size: 16px;" class="subtitle" >
                <option value="">{{$user->country}}</option>
                  @foreach($countries as $country)
                  <option value="{{$country}}">{{$country}}</option>
                  @endforeach
                </select>
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Часовой пояс</label>
               <div class="col-sm-5">
               <select name="timezone" id=""style="font-size: 16px;" class="subtitle">
                    <option value="{{$user->timezone}}">{{$user->timezone}}</option>
                   @foreach($timezones as $timezone)
                  <option value="{{$timezone}}">{{$timezone}}</option>
                  @endforeach
                </select>
               </div>
             </div>
           
             <button type="btn" class="btn  submit-btn  mt-4" style="margin-right: 10px;">Сохранить</button>

             
   <a href="{{route('delete_profile', $user_id)}}" class=" btn  submit-btn  mt-4">Удалить Профиль</a>
   </fieldset>
          </form>
    </div>

    <div class="col-md-6">
     
  </div>

