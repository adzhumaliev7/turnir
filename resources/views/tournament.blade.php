 
 
 
@extends('layout')
@section('content')

    <main>
        <div class="container">
            <div class="row">
                <div class="row my-3">
                    @if($tournaments != "")
                      @foreach($tournaments as $tournament)
                    <div class="col-lg-4">
                        <div class="tournaments tournaments-block">
                            <div class="tournaments__text">
                                <h4 class="pubg__title pubg__title--margin text-black tournaments--margin-t tournaments--padding-b">{{$tournament->name}}</h4>
                                <p class="pubg__text text-black subtitle--medium ">{{$tournament->tournament_start}} {{$tournament->games_time}} {{$tournament->country}}</p>
                                <span class="pubg__price text-black tournaments__price--margin-t">Призовой фонд: {{$tournament->price}}</span>
                                <p class="pubg__text text-black subtitle--medium tournaments__text--margin">Режим проведения: squad(4)</p>
                                <a href="{{ route('match', $tournament->id) }}" class="submit-btn btn--orange ">Принять участие</a>
                            </div>
                        <div class="tournaments__img"></div>
                    </div>
                </div>
                 @endforeach
                 @else
                 <h4> Турниров нет</h4>
                 @endif
             </div>
            
            </div>
        </div>
    </main>

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