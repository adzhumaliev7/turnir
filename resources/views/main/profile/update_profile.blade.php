<form method="POST" action="{{route('update_profile')}}" enctype="multipart/form-data" >
            @csrf
            @foreach($data['data'] as $dat )
            <div class="row">
              <div class="col-lg">
                <input type="file" class="form-control input__profile subtitle fw-normal" id="fileInput" name="doc_photo" <?= $disabled; ?>>
                <label class="subtitle" for="fileInput">Фото документа(паспорт, права id)</label>
              </div>
              <div class="col-lg">
                <input type="file" class="form-control input__profile subtitle fw-normal" id="fileInput2" name="doc_photo2" <?= $disabled; ?>>
                <label class="subtitle" for="fileInput2">фото с документом</label>
              </div>
            </div>
            <div class="alert alert-danger" style="font-size: 16px;">Для верификации загрузите две стороны удостоверения личности</div>
            <div class="row size_16px">
              <input type="hidden" class="form-control input__profile subtitle fw-normal " name="photo_error">
            </div>
            <h2 class="title letter-spacing--none my-2"> Основная информация</h2>
            <div class="row mt-4">
              <div class="col-lg-6">
                <input name="phone" placeholder="Номер телефона" type="tel" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->phone}}" <?= $disabled; ?>>
                @error('phone')
                <div class="alert alert-danger">Введите номер телефона</div>
                @enderror
              </div>
              <div class="col-lg-6">
                <input name="fio" placeholder="Имя Фамилия" type="text" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->fio}}" <?= $disabled; ?>>
                @error('fio')
                <div class="alert alert-danger">Введите имя</div>
                @enderror
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6">
                <input name="login" placeholder="*Ник" type="text" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->login}}" <?= $disabled; ?>>
                @error('login')
                <div class="alert alert-danger">Введите логин</div>
                @enderror
              </div>
              <div class="col-lg-6">
                <input name="email" placeholder="Email" type="text" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->email}}" <?= $disabled; ?>>
                @error('email')
                <div class="alert alert-danger">Такой email уже занят</div>
                @enderror
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6">
                <select name="country" id="" style="font-size: 16px;">
                  @foreach($countries as $country)
                  <option value="{{$dat->country}}">{{$country}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-6">
                <select name="timezone" id="" class="size_16px" <?= $disabled; ?>>
                    <option value="{{$dat->timezone}}">{{$dat->timezone}}</option>
                   @foreach($timezones as $timezone)
                  <option value="{{$timezone}}">{{$timezone}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6">
                <input name="city" placeholder="Город" type="text " class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->city}}" <?= $disabled; ?>>
              </div>
              <div class="col-lg-6">
                <input name="bdate" placeholder="Дата рождения" type="date" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->bdate}}" <?= $disabled; ?>>
              </div>
            </div>
            <h2 class="title letter-spacing--none indent--row">
              Игровой профиль PUBG MOBILE
            </h2>
            <div class="row">
              <div class="col-lg">
                <input placeholder="Nick name" name="nickname" type="text" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->nickname}}" <?= $disabled; ?>>
              </div>
              <div class="col-lg">
                <input placeholder="ID игрока в PUBG Mobile" type="text" name="game_id" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->game_id}}" <?= $disabled; ?>>
                @error('login')
                <div class="alert alert-danger">Игровой id уже занят</div>
                @enderror
              </div>
            </div>
            @endforeach
            @if($disabled == 'disabled')
            <a type="btn" class="forms__btn btn nav-link btn--orange mt-4" data-toggle="modal" data-target="#ModalQuery">Отпаравить запрос на редактирвоание данных</a>
            @else <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
            @endif
          </form>
