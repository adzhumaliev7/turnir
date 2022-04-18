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
            @foreach($data['data'] as $dat )
            <h2 class="title letter-spacing--none indent--row">
             Основная информация
            </h2>

           <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label">Логин</label>
               <div class="col-sm-5">
                 <input type="text" name="name"  class="form-control subtitle" id=""  value="{{$dat->name}}">
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Email</label>
               <div class="col-sm-5">
                 <input type="text" name="" class="form-control subtitle" readonly id="" placeholder="email"  value="{{$dat->email}}">
               </div>
             </div>
          
             <a class="btn  submit-btn  mt-4" data-toggle="modal" data-target="#changePassword">Изменить пароль</a>
             <h2 class="title letter-spacing--none indent--row">
            Игровой профиль
            </h2>
           <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label">Ник</label>
               <div class="col-sm-5">
                 <input type="text" name="nickname"  class="form-control subtitle" id="" value="{{$dat->nickname}}">
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Игровой ID</label>
               <div class="col-sm-5">
                 <input type="text" name="game_id" class="form-control subtitle" id="" placeholder=""  value="{{$dat->game_id}}">
                 <input type="hidden" name="old_game_id" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->game_id}}">
               </div>
             </div>
             <h2 class="title letter-spacing--none indent--row">
            Персональная информация
            </h2>
           <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label">Телефон</label>
               <div class="col-sm-5">
                 <input type="text" name="phone"  class="form-control subtitle" id="" value="{{$dat->phone}}">
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Дата рождения</label>
               <div class="col-sm-5">
                 <input type="date" name="bdate" class="form-control subtitle"  id="" placeholder="email"  value="{{$dat->bdate}}">
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Страна</label>
               <div class="col-sm-5">
               <select name="country" id="" style="font-size: 16px;" class="subtitle" >
                <option value="{{$dat->country}}">{{$dat->country}}</option>
                  @foreach($countries as $country)
                  <option value="{{$dat->country}}">{{$country}}</option>
                  @endforeach
                </select>
               </div>
             </div>
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label">Часовой пояс</label>
               <div class="col-sm-5">
               <select name="timezone" id=""style="font-size: 16px;" class="subtitle">
                    <option value="{{$dat->timezone}}">{{$dat->timezone}}</option>
                   @foreach($timezones as $timezone)
                  <option value="{{$timezone}}">{{$timezone}}</option>
                  @endforeach
                </select>
               </div>
             </div>
             @endforeach
             <button type="btn" class="btn  submit-btn  mt-4" style="margin-right: 10px;">Сохранить</button>

             
   <a href="{{route('delete_profile', $user_id)}}" class=" btn  submit-btn  mt-4">Удалить Профиль</a>
   </fieldset>
          </form>
    </div>

    <div class="col-md-6">
        <div class="form-group row">
    <form method="POST" action="{{route('update_profile')}}" enctype="multipart/form-data" class="size_16" >
    <fieldset <?echo $disabled;?>>
            @csrf
            @foreach($data['data'] as $dat )
            <h2 class="title letter-spacing--none indent--row">
                Верификация
            </h2>
            <h4 style="opacity: 0.5;">Верификация необходима для выплат призового фонда</h4>
            <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label">ФИО</label>
               <div class="col-sm-5">
                 <input type="text" name="fio"  class="form-control subtitle" id=""  value="{{$dat->fio}}">
               </div>
             </div>
           <div class="form-group row">
               <label for="name" class="col-sm-3 col-form-label"></label>
               <div class="col-sm-10">
               <input type="file" class="form-control  subtitle" id="fileInput" name="doc_photo" >
                <label class="subtitle" for="fileInput">Фото документа(паспорт, права id)</label>
                @error('doc_photo')
                <div class="alert alert-danger">Документ должен быть изображением и не превышать 2МБ </div>
                @enderror
              </div>
             </div> 
             <div class="form-group row">
               <label for="email" class="col-sm-3 col-form-label"></label>
               <div class="col-sm-10">
               <input type="file" class="form-control  subtitle " id="fileInput2" name="doc_photo2">
               
                        
                <label class="subtitle" for="fileInput2">фото с документом</label>
                @error('doc_photo2')
                <div class="alert alert-danger">Документ должен быть изображением и не превышать 2МБ </div>
                @enderror
               </div>
             </div>
             <h4 style="opacity: 0.5; margin-top: 20px; ">**Фото с документом в руках</h4>
             <h4 style="opacity: 0.5;">*Обязательные поля для заполнения</h4>
             <h4 style="opacity: 0.5;">*Документ обязательно должен быть изображением и не преавышать размер не более 5МБ</h4>
           
             @endforeach
    <p class="   mt-5">Статус: <?echo $h4;?></p>
    <button type="btn" class="btn  submit-btn  mt-4" style="float: right;">Сохранить</button>
    </fieldset>
          </form>
          </div>
          <a style="text-decoration: none; font-size:16px;" id="toggleLink" href="javascript:void(0);" onclick="viewdiv('mydiv');" data-text-show="*Образец фото документа в руках" data-text-hide="*Образец фото документа в руках">*Образец фото документа в руках</a>
                <div id="mydiv" style="display:block;"><img  src="{{ asset("uploads/storage/img/default/doc.jpg")}}"  width="350" height="200" ></div>
		<!--А это наш блок с тэгом <img>, который выведет картинку "demo.jpg"-->
	
    </div>
  </div>

