 
 
 
@extends('layout')
@section('content')

<section>
        <div class="container">
            @foreach($tournaments as $tournament)
            <div class="row background-gray d-flex align-items-start">
                <div class="col-lg col--style">
                    <h1>{{$tournament->name}}</h1>
                    
                    <p class="subtitle subtitle--medium">{{$tournament->tournament_start}} {{$tournament->games_time}}</p> 
                
                    <div class="profile-block d-flex justify-content-between profile-block--style">
                        <p class="subtitle">Призовой фонд: {{$tournament->price}}</p>
                        <p class="subtitle">Карта: </p>
                    </div>

                    <div class="profile-block d-flex justify-content-between profile-block--style">
                        <p class="subtitle subtitle--regular">Режим проведения: squad(4)</p>
                        <p class="subtitle">Вид: от третьего лица</p>
                    </div>

                </div>
                <div class="col-lg-5 col--style-2">
                    <img class="" src="{{ asset("uploads/storage/adminimg/$tournament->file_label")}}"  width="475" height="288"" alt="">
                </div>
                
            </div>

            <ul class="nav nav-tabs nav-tabss tourn-menu--margin" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link nav-btn " id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="false">Обзор</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link nav-btn" id="team-tab" data-bs-toggle="tab" data-bs-target="#team" type="button" role="tab" aria-controls="team" aria-selected="false">Команды</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link nav-btn active" id="tournament-tab" data-bs-toggle="tab" data-bs-target="#tournament" type="button" role="tab" aria-controls="tournament" aria-selected="true">Турниры</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-btn" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Настройки</button>
                </li>
            </ul>

        <div class="line-bottom"></div>
            
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
                    <div class="row">
                        <div class="col-lg-8">
                            <p class="subtitle">{{$tournament->description}}</p>
                           
                        </div>
                        <div class="col-lg-4">
                            <form action="post">
                                <div class="holding holding-block">
                                    <p class="subtitle holding__title">Дата проведения</p>
                                    <span class="subtitle subtitle--semi-medium">{{$tournament->tournament_start}}</span>
                                    <span class="subtitle subtitle--semi-medium d-block">{{$tournament->games_time}} {{$tournament->country}}(+6 GMT)</span>
                                        <hr>
                                    <div class="block">
                                    <svg class="config" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.5 0C2.90715 0 0 2.9074 0 6.5C0 10.0928 2.9074 13 6.5 13C10.0928 13 13 10.0926 13 6.5C13 2.90715 10.0926 0 6.5 0ZM6.5 11.9844C3.46854 11.9844 1.01562 9.53126 1.01562 6.5C1.01562 3.46854 3.46874 1.01562 6.5 1.01562C9.53146 1.01562 11.9844 3.46874 11.9844 6.5C11.9844 9.53146 9.53126 11.9844 6.5 11.9844Z" fill="black"/>
                                        <path d="M6.5 3.27222C6.21954 3.27222 5.99219 3.49956 5.99219 3.78003V7.05016C5.99219 7.33063 6.21954 7.55797 6.5 7.55797C6.78046 7.55797 7.00781 7.33063 7.00781 7.05016V3.78003C7.00781 3.49956 6.78046 3.27222 6.5 3.27222Z" fill="black"/>
                                        <path d="M6.5 9.5509C6.87862 9.5509 7.18555 9.24397 7.18555 8.86536C7.18555 8.48674 6.87862 8.17981 6.5 8.17981C6.12138 8.17981 5.81445 8.48674 5.81445 8.86536C5.81445 9.24397 6.12138 9.5509 6.5 9.5509Z" fill="black"/>
                                    </svg>
                                    <p class="subtitle subtitle--regular subtitle--inline-b">Условия для участия:</p>
                                    <ul>
                                        <li class="subtitle subtitle--regular">вы не получили условие 1</li>
                                        <li class="subtitle subtitle--regular">вы не получили условие 2</li>
                                        <li class="subtitle subtitle--regular">вы не получили условие 3</li>
                                    </ul>    
                                    </div>
                                    <details open class="holding__accordion">
                                        @foreach($teams as $team)
                                        <summary class="subtitle subtitle--semi-medium">{{$team->name}}</summary>
                                        @endforeach
                                       <!--  <ul class="subtitle subtitle--list">
                                            <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.93126 3.75481C8.09911 3.92266 8.09911 4.19474 7.93126 4.3625L5.04866 7.24519C4.88081 7.41295 4.60882 7.41295 4.44097 7.24519L3.06874 5.87287C2.90089 5.70511 2.90089 5.43303 3.06874 5.26527C3.2365 5.09742 3.50858 5.09742 3.67635 5.26527L4.74477 6.33369L7.32357 3.75481C7.49142 3.58705 7.7635 3.58705 7.93126 3.75481ZM11 5.5C11 8.54012 8.5397 11 5.5 11C2.45988 11 0 8.5397 0 5.5C0 2.45988 2.4603 0 5.5 0C8.54012 0 11 2.4603 11 5.5ZM10.1406 5.5C10.1406 2.93488 8.06478 0.859375 5.5 0.859375C2.93488 0.859375 0.859375 2.93522 0.859375 5.5C0.859375 8.06512 2.93522 10.1406 5.5 10.1406C8.06512 10.1406 10.1406 8.06478 10.1406 5.5Z" fill="black"/>
                                                </svg>
                                                участник 1</li>
                                            <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.93126 3.75481C8.09911 3.92266 8.09911 4.19474 7.93126 4.3625L5.04866 7.24519C4.88081 7.41295 4.60882 7.41295 4.44097 7.24519L3.06874 5.87287C2.90089 5.70511 2.90089 5.43303 3.06874 5.26527C3.2365 5.09742 3.50858 5.09742 3.67635 5.26527L4.74477 6.33369L7.32357 3.75481C7.49142 3.58705 7.7635 3.58705 7.93126 3.75481ZM11 5.5C11 8.54012 8.5397 11 5.5 11C2.45988 11 0 8.5397 0 5.5C0 2.45988 2.4603 0 5.5 0C8.54012 0 11 2.4603 11 5.5ZM10.1406 5.5C10.1406 2.93488 8.06478 0.859375 5.5 0.859375C2.93488 0.859375 0.859375 2.93522 0.859375 5.5C0.859375 8.06512 2.93522 10.1406 5.5 10.1406C8.06512 10.1406 10.1406 8.06478 10.1406 5.5Z" fill="black"/>
                                                </svg>
                                                участник 2</li>
                                            <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="5.5" cy="5.5" r="5" stroke="black"/>
                                                </svg>
                                                участник 3</li>
                                            <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="5.5" cy="5.5" r="5" stroke="black"/>
                                                </svg>
                                                участник 4</li>
                                            <li class="subtitle subtitle--regular"><svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.93126 3.75481C8.09911 3.92266 8.09911 4.19474 7.93126 4.3625L5.04866 7.24519C4.88081 7.41295 4.60882 7.41295 4.44097 7.24519L3.06874 5.87287C2.90089 5.70511 2.90089 5.43303 3.06874 5.26527C3.2365 5.09742 3.50858 5.09742 3.67635 5.26527L4.74477 6.33369L7.32357 3.75481C7.49142 3.58705 7.7635 3.58705 7.93126 3.75481ZM11 5.5C11 8.54012 8.5397 11 5.5 11C2.45988 11 0 8.5397 0 5.5C0 2.45988 2.4603 0 5.5 0C8.54012 0 11 2.4603 11 5.5ZM10.1406 5.5C10.1406 2.93488 8.06478 0.859375 5.5 0.859375C2.93488 0.859375 0.859375 2.93522 0.859375 5.5C0.859375 8.06512 2.93522 10.1406 5.5 10.1406C8.06512 10.1406 10.1406 8.06478 10.1406 5.5Z" fill="black"/>
                                                </svg>
                                                участник 5</li>
                                        </ul> -->
                                    </details>
                            @if($checked != " ")     
                                @if($checked == 'captain')
                                    <div class="block-btn">
                                        <a href="{{route('join', $tournament->id)}}" class="submit-btn btn--size btn--orange btn--margin">Принять участие</a>
                                    </div>
                                @elseif(($checked == 'member')) 
                                <div class="block-btn">
                                     <h3>Принять участие может только капитан команды</h3>
                                 </div>
                                 @else 
                                   <div class="block-btn">
                                     <h3>Вы зарегистрированы</h3>
                                 </div>
                                 @endif
                                 @else 
                                  <div class="block-btn">
                                     <h3>У вас нет команды</h3>
                                 </div>
                             @endif 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
                    team
                </div>
                <div class="tab-pane fade" id="tournament" role="tabpanel" aria-labelledby="tourname nt-tab">
                    tourname
                </div>
                <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    settings
                </div>
              </div>

@endforeach

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