<form method="POST" action="{{route('update_profile')}}" enctype="multipart/form-data" <?= $disabled; ?>>
            @csrf
            @foreach($data['data'] as $dat )
      
            <h2 class="title letter-spacing--none indent--row">
             Основная информация
            </h2>

            <div class="row mt-4">
              <div class="col-lg-6">
                <input name="name"  placeholder="*Ник" type="text" class="form-control  subtitle  " id="" value="Ник: {{$dat->name}}" readonly>
                @error('name')
                <div class="alert alert-danger">Введите логин</div>
                @enderror
              </div>
              <div class="col-lg-6">
                <input name="" placeholder="Email" readonly type="text" class="form-control  subtitle " id="" value="Почта: {{$dat->email}}" readonly>
            
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
                <input name="phone" placeholder="Номер телефона" type="tel" class="form-control  subtitle" id="" value="Телефон: {{$dat->phone}}" readonly>
                @error('phone')
                <div class="alert alert-danger">Введите номер телефона</div>
                @enderror
              </div>
              <div class="col-lg-6">
                <input name="fio" placeholder="Имя Фамилия" type="text" class="form-control  subtitle" id="" value="ФИО: {{$dat->fio}}" readonly>
                @error('fio')
                <div class="alert alert-danger">Введите имя</div>
                @enderror
              </div>
            </div>
           
            <div class="row mt-4">
              <div class="col-lg-6">
              <input name="country" placeholder="" type="tel" class="form-control  subtitle fw-normal " id="" value="Страна: {{$dat->country}}" readonly>
              </div>
              <div class="col-lg-6">
                <input name="bdate" placeholder="Дата рождения" type="date" class="form-control  subtitle " id="" value="{{$dat->bdate}}" readonly>
              </div>
            </div>
          
            <h2 class="title letter-spacing--none indent--row">
              Игровой профиль PUBG MOBILE
            </h2>
            <div class="row">
              <div class="col-lg">
                <input placeholder="Nick name" name="nickname" type="text" class="form-control  subtitle  " id="" value="Игровой ник: {{$dat->nickname}}" readonly>
              </div>
              <div class="col-lg">
                <input placeholder="ID игрока в PUBG Mobile" type="text" name="game_id" class="form-control  subtitle  " id="" value="Игровой ID: {{$dat->game_id}}" readonly>
             
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
