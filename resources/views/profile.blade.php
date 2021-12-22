@extends('layout')
@section('content')



    <section>
        <div class="container">
            <div class="row background-gray d-flex align-items-center row-indent-mr">
                <div class="col-lg-3">
                    <div class="wrap">
                        <img class="brd-img" src="http://placehold.it/224" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                   @if(!$data==NULL)
                    @foreach($data as $dat)
                    <h1 class="title text-capitalize font-sz">{{$dat->fio}}</h1>
                    <sub class="subtitle"><?if($dat->verification=='verified'){echo "Верифицирован";}else{echo "Не верифицирован";}?></sub>
                    @endforeach
                    @else
                      <h1 class="title text-capitalize font-sz">Имя Пользователя</h1>
                    <sub class="subtitle">Не верифицирован</sub>
                  @endif
                </div>  
                <div class="col-lg-4">
                    <img class="" src="http://placehold.it/475x288" alt="">
                </div>
                
            </div>

            <ul class="nav nav-tabs nav-tabss" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link nav-btn active " id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="false">Обзор</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link nav-btn"  id="team-tab" data-bs-toggle="tab" data-bs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="false">Команды</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link nav-btn " id="tournament-tab" data-bs-toggle="tab" data-bs-target="#tournament" type="button" role="tab" aria-controls="tournament" aria-selected="true">Турниры</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-btn" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Настройки</button>
                </li>
            </ul>

        <div class="line-bottom"></div>
            
              <div class="tab-content" id="myTabContent">
                  @if(Session::has('flash_meassage'))
                  <div class="alert alert-success">{{Session::get('flash_meassage')}}</div>
                  @endif 
                <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
                    <div class="block-view">
                         @if(!$data==NULL)
                         @foreach($data as $dat)
                             <?if($dat->verification=='verified'){
                                 $style='style="display:none;"';
                                 $h4 = 'Аккаунт верифицирован' ;                          
                             }else {
                                  $style='style="display:show;"';
                                 $h4 = 'Пройти верификацию';    
                             }
                         ?>
                        @endforeach
                        @else
                             <?
                                 $style='style="display:show;"';
                                 $h4 = 'Аккаунт верифицирован' ;                          
                             
                         ?>
                        @endif
                      
                         <h4 class="input-title"><?echo $h4;?></h4>
                        <form  method="POST" action="{{action('App\Http\Controllers\ProfileController@saveProfile') }}" enctype="multipart/form-data" <?echo $style;?>>
                             @csrf
                     

                        <div class="row indent--row">
                            <div class="col d-flex justify-content-between">
                                
                                <input class="input-footer " name="doc_photo" placeholder="фото документа(паспорт, права, id)" type="file">
                                  
                                <input class="input-footer"  name="doc_photo2" placeholder="Фото с документом " type="file">
                            </div>
                        </div>

                        <div class="orange-line"></div>

                        <h4 class="input-title">Основная информация</h4>

                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <input class="input-footer "  name="phone" placeholder="Номер телефона" type="text">
                                 @error('phone')
                                   <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <input class="input-footer"  name="fio" placeholder="Имя Фамилия" type="text">
                                 @error('fio')
                                   <div class="alert alert-danger">{{$message}}</div>
                                 @enderror
                            </div>
                        </div>

                        <div class="row indent--row">
                            <div class="col d-flex justify-content-between">
                                <input class="input-footer " name="login" placeholder="Ник*" type="text">
                                @error('login')
                                   <div class="alert alert-danger">{{$message}}</div>
                                 @enderror
                                <input class="input-footer" name="email" placeholder="Email" type="text">
                                @error('email')
                                   <div class="alert alert-danger">{{$message}}</div>
                                 @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <input class="input-footer " name="country" placeholder="Страна*" type="text">
                                <input class="input-footer"  name="timezone" placeholder="Часовой пояс" type="text">
                            </div>
                        </div>
                        
                        <div class="row indent--row">
                            <div class="col d-flex justify-content-between">
                                <input class="input-footer "  name="city" placeholder="Город*" type="text">
                                <input class="input-footer"  name="bdate" placeholder="Дата рождения" type="date">
                            </div>
                        </div>

                        <h4 class="input-title">Игровой профиль PUBG MOBILE</h4>

                        <div class="row indent--row">
                            <div class="col d-flex justify-content-between">
                                <input class="input-footer " name="nickname" placeholder="Nick name" type="text">
                                @error('nickname')
                                   <div class="alert alert-danger">{{$message}}</div>
                                 @enderror
                                <input class="input-footer"  name="game_id" placeholder="55814218285" type="text">
                                @error('game_id')
                                   <div class="alert alert-danger">{{$message}}</div>
                                 @enderror
                            </div>
                        </div>

                        <button class="submit-btn btn--size btn--mr">Создать</button>

                </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">


                    <div class="block-team">
                        <h1 class="input-title">Мои Команды</h1>
                      @if($teams)          
                        @foreach($teams as $team)
                        <div class="row">
                            <div class="col d-flex justify-content-between border--block">
                                <a href="{{ route('team', $team->user_id) }}"><p class="block-team__text">{{$team->name}}</p></a>
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.7474 18.6157C14.9556 18.6157 15.1623 18.5508 15.3387 18.4232C15.6673 18.185 15.8208 17.7757 15.7314 17.3806L14.5091 11.9963L18.6544 8.36095C18.9591 8.09494 19.0755 7.67368 18.9504 7.28823C18.8253 6.9035 18.485 6.63111 18.082 6.59386L12.5972 6.09591L10.4287 1.02122C10.2688 0.648375 9.90464 0.407593 9.50005 0.407593C9.09546 0.407593 8.73132 0.648375 8.57143 1.02035L6.40294 6.09591L0.919016 6.59386C0.51515 6.63024 0.17478 6.9035 0.0496769 7.28823C-0.0754261 7.67296 0.0402546 8.09494 0.344965 8.36095L4.4903 11.9956L3.26798 17.3798C3.1784 17.7757 3.33206 18.185 3.66054 18.4225C3.9883 18.6599 4.42536 18.6782 4.77052 18.4708L9.50005 15.6444L14.2296 18.4724C14.3895 18.5673 14.5676 18.6157 14.7474 18.6157ZM9.50005 14.4269C9.3203 14.4269 9.14229 14.4752 8.98225 14.5701L4.51872 17.2397L5.67233 12.1578C5.75466 11.7961 5.63188 11.4185 5.3524 11.1738L1.43827 7.74109L6.61676 7.27083C6.9896 7.23676 7.31025 7.00236 7.45594 6.6588L9.50005 1.86983L11.5466 6.65952C11.6907 7.00077 12.0114 7.23517 12.3834 7.26924L17.5626 7.73949L13.6486 11.1722C13.3682 11.4176 13.2456 11.7945 13.3287 12.1571L14.4814 17.2389L10.0179 14.5701C9.85797 14.4752 9.67981 14.4269 9.50005 14.4269ZM12.6391 6.19405C12.6391 6.19405 12.6391 6.19492 12.6399 6.19564L12.6391 6.19405ZM6.36264 6.19173L6.36177 6.19333C6.36177 6.19246 6.36177 6.19246 6.36264 6.19173Z" fill="black"/>
                                </svg>
                            </div>
                        </div>
                        @endforeach
                        @endif
                      <!---  <div class="row">
                            <div class="col d-flex justify-content-between border--block margin--block">
                                <p class="block-team__text">Uventus_team</p>
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.2708 14.25H11.4792C11.2606 14.25 11.0833 14.4272 11.0833 14.6458V17.4167H1.58335V1.58335H11.0833V4.35419C11.0833 4.5728 11.2606 4.75004 11.4792 4.75004H12.2708C12.4895 4.75004 12.6667 4.5728 12.6667 4.35419V1.58335C12.6667 0.7089 11.9578 0 11.0833 0H1.58335C0.7089 0 0 0.7089 0 1.58335V17.4167C0 18.2911 0.7089 19 1.58335 19H11.0833C11.9578 19 12.6667 18.2911 12.6667 17.4167V14.6458C12.6667 14.4272 12.4895 14.25 12.2708 14.25Z" fill="black"/>
                                    <path d="M18.8717 9.20813L14.1217 4.85397C14.0057 4.74844 13.8376 4.71945 13.6949 4.78362C13.5511 4.84663 13.4583 4.98887 13.4583 5.1458V5.93749C13.4583 6.0496 13.5059 6.15666 13.5894 6.23166L16.3411 8.70834H5.14585C4.92705 8.70834 4.75 8.88539 4.75 9.10419V9.89584C4.75 10.1146 4.92705 10.2917 5.14585 10.2917H16.3411L13.5894 12.7684C13.5059 12.8434 13.4583 12.9504 13.4583 13.0625V13.8542C13.4583 14.0111 13.5511 14.1534 13.6949 14.2164C13.7459 14.2392 13.8005 14.25 13.8542 14.25C13.9512 14.25 14.0471 14.214 14.1217 14.146L18.8717 9.79186C18.9536 9.71686 19 9.61095 19 9.49999C19 9.38904 18.9536 9.28313 18.8717 9.20813Z" fill="black"/>
                                    </svg>
                                    
                            </div>
                        </div>--->
                         @if(Session::has('flash_meassage2'))
                  <div class="alert alert-success">{{Session::get('flash_meassage2')}}</div>
                  @endif 
                        @if(Session::has('flash_meassage_error'))
                  <div class="alert alert-danger">{{Session::get('flash_meassage_error')}}</div>
                  @endif 
                         <form  method="POST" action="{{action('App\Http\Controllers\ProfileController@createTeam') }}">
                           @csrf
                            <input class="input-footer"  name="name" placeholder="Название команды"  type="text" style="margin-top:20px;">
                            <button class="submit-btn btn--size btn--mr">Создать</button>
                        </form>
                    </div>

                </div>
                <div class="tab-pane fade" id="tournament" role="tabpanel" aria-labelledby="tourname nt-tab">
                    <h1 class="title">Мои турниры</h1>
                   @if($tournaments != NULL)
                    @foreach($tournaments as $tournament)         
                <div class="table-block">
                    <table class="table">
                        <thead>
                          <tr>
                            <th class="subtitle" scope="col">Текущие</th>
                            <th class="subtitle" scope="col">Прощедшие</th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr class="first-table">
                            <td h scope="row"></td>
                            <td class="pubg-title">Даты</td>
                            <td class="pubg-title">Участники</td>
                            <td class="pubg-title">Приз</td>
                        </tr>
                          <tr class="second-table"> 
                            <th class="pubg-title" scope="row">{{$tournament->name}}</th>
                            <td class="pubg-title">{{$tournament->tournament_start}}  {{$tournament->timezone}}</td>
                            <td class="pubg-title">4x4</td>
                            <td class="pubg-title">512/512</td>
                            <td class="pubg-title">{{$tournament->price}} </td>
                            <td>
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.2708 14.25H11.4792C11.2606 14.25 11.0833 14.4272 11.0833 14.6458V17.4167H1.58335V1.58335H11.0833V4.35419C11.0833 4.5728 11.2606 4.75004 11.4792 4.75004H12.2708C12.4895 4.75004 12.6667 4.5728 12.6667 4.35419V1.58335C12.6667 0.7089 11.9578 0 11.0833 0H1.58335C0.7089 0 0 0.7089 0 1.58335V17.4167C0 18.2911 0.7089 19 1.58335 19H11.0833C11.9578 19 12.6667 18.2911 12.6667 17.4167V14.6458C12.6667 14.4272 12.4895 14.25 12.2708 14.25Z" fill="black"/>
                                <path d="M18.8717 9.20817L14.1217 4.85402C14.0057 4.74848 13.8376 4.7195 13.6949 4.78366C13.5511 4.84667 13.4583 4.98891 13.4583 5.14585V5.93754C13.4583 6.04965 13.5059 6.15671 13.5894 6.23171L16.3411 8.70839H5.14585C4.92705 8.70839 4.75 8.88543 4.75 9.10423V9.89588C4.75 10.1147 4.92705 10.2917 5.14585 10.2917H16.3411L13.5894 12.7684C13.5059 12.8434 13.4583 12.9505 13.4583 13.0626V13.8542C13.4583 14.0112 13.5511 14.1534 13.6949 14.2164C13.7459 14.2392 13.8005 14.25 13.8542 14.25C13.9512 14.25 14.0471 14.2141 14.1217 14.1461L18.8717 9.7919C18.9536 9.71691 19 9.611 19 9.50004C19 9.38908 18.9536 9.28317 18.8717 9.20817Z" fill="black"/>
                                </svg>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                        @endforeach
                       @endif 
                      <a href="{{route('tournament')}}" class="submit-btn btn-width text-btn">Все турниры</a>


                </div>
                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    <form  method="POST" action="{{route('delete_profile', $user_id)}}">
                       @csrf
                        <button class="submit-btn btn--size btn--mr">Удалить профиль</button>
                    </form>    
                </div>
              </div>
        </div>
    </section>

    <footer>
        <div class="footer">
            <div class="footer__inner">
                <div class="container">
                    <div class="row">
                        <div class="col"><a class="footer__link" href="#">О проекте</a></div>
                        <div class="col"><a class="footer__link" href="#">Сотрудничество</a></div>
                        <div class="col"><a class="footer__link" href="#">Помощь</a></div>
                        <div class="col"><a class="footer__link" href="#">Пользовательское соглашение</a></div>
                        <div class="col"><a class="footer__link" href="#">Правила и ограничения</a></div>
                        <div class="col">
                            <a href="#"><i class="fab fa-telegram footer__icons"></i></a>
                            <a href="#"><i class="fab fa-youtube footer__icons"></i></a>
                            <a href="#"><i class="fab fa-discord footer__icons"></i></a>
                            <a href="#"><i class="fab fa-instagram footer__icons"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <p class="footer__text">Showmatch.pro - киберспортивная турнирная платформа для мобильного гейминга</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection