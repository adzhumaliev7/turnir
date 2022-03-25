<form method="POST" action="{{route('update_profile')}}" enctype="multipart/form-data" >
            @csrf
            @foreach($data['data'] as $dat )
      
            <h2 class="title letter-spacing--none indent--row">
             Основная информация
            </h2>

            <div class="row mt-4">
              <div class="col-lg-6">
                <input name="name" placeholder="*Ник" type="text" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->name}}" <?= $disabled; ?>>
                @error('name')
                <div class="alert alert-danger">Введите логин</div>
                @enderror
              </div>
              <div class="col-lg-6">
                <input name="" placeholder="Email" type="text" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->email}}"  disabled>
                @error('email')
                <div class="alert alert-danger">Такой email уже занят</div>
                @enderror
              </div>
            </div>
            <h2 class="title letter-spacing--none indent--row">
             Персональная информация
            </h2>
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
              <input name="country" placeholder="" type="tel" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->country}}" <?= $disabled; ?>>
               
              </div>
              <div class="col-lg-6">
              <input name="timezone" placeholder="" type="tel" class="form-control input__profile subtitle fw-normal" id="" value="{{$dat->timezone}}" <?= $disabled; ?>>
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
          
            @else <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
            @endif
          </form>
