@extends('layout')
@section('content')

 
   
   @if(Session::has('flash_meassage'))
                  <div class="alert alert-success">{{Session::get('flash_meassage')}}</div>
                  @endif 
      <form method="POST" action="{{route('save_order')}}">
           @csrf
        <div class="container">
        
          <div class="row">
            
          <!-- ! title -->                                                                                                                                                                            
          <h2 class="title letter-spacing--none indent--row">
            Основная информация
          </h2>
  
        
               <div class="row">
            <div class="col-lg">
              <input
                placeholder="Название турнира"
                name="name"
                type="text"
                class="form-control input__profile subtitle fw-normal"
                aria-describedby="emailHelp"
              />
            </div>
            <div class="col-lg">
              <input
                placeholder="Формат"
                name="format"
                type="text"
                class="form-control input__profile subtitle fw-normal"
                id="exampleInputPassword1"
              />
            </div>
          </div>
            <div class="row my-4">
              <div class="col-lg">
                <input
                  placeholder="Страна*"
                  name="country"
                  type="text"
                  class="form-control input__profile subtitle fw-normal"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="col-lg">
                <input
                  placeholder="Часовой пояс"
                  name="timezone"
                  type="timezone"
                  class="form-control input__profile subtitle fw-normal"
                  id="exampleInputPassword1"
                />
              </div>
            </div>
            <!-- fourth  column -->
            <div class="row my-4">
              <div class="col-lg-6">
                <input
                  placeholder="Допустимые страны"
                  name="countries"
                  type="text"
                  class="form-control input__profile subtitle fw-normal"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="col-lg-6">
                <input
                  name="players_col"
                  placeholder="Допустимый уровень игроков"
                  type="text"
                  class="form-control input__profile subtitle fw-normal"
                  id="exampleInputPassword1"
                />
              </div>
              <div class="col-lg-6 mt-4">
                <input
                  name="file1"
                  placeholder="Файл не выбран"
                  type="file"
                  class="form-control input__profile subtitle fw-normal"
                  id="exampleInputPassword1"
                />
              </div>
            </div>
            <div class="row">
              <h2 class="title letter-spacing--none indent--row">
                Описание турнира
              </h2>
              <div class="form-floating">
                <textarea
                  name="description"
                  class="form-control"
                  placeholder="Leave a comment here"
                  style="height: 100px"
                ></textarea>
                <label class="subtitle">Comments</label>
              </div>
            </div>
            <div class="row">
              <h2 class="title letter-spacing--none indent--row">
                Основная информация
              </h2>
              <div class="col-lg">
                <input
                  name="start_reg"  
                  placeholder="Начало регистраци"
                  type="email"
                  class="form-control input__profile subtitle fw-normal"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="col-lg">
                <input
                  name="end_reg"  
                  placeholder="Завершение регистраци"
                  type="password"
                  class="form-control input__profile subtitle fw-normal"
                  id="exampleInputPassword1"
                />
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg">
                <input
                  name="slot_kolvo"
                  placeholder="Кол-во слотов"
                  type="text"
                  class="form-control input__profile subtitle fw-normal"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="col-lg">
                <input
                  name="ligue"
                  placeholder="Лига"
                  type="text"
                  class="form-control input__profile subtitle fw-normal"
                  id="exampleInputPassword1"
                />
              </div>
            </div>
            <div class="row">
              <h2 class="title letter-spacing--none indent--row">Правила</h2>
              <div class="col-lg-6">
                <input
                  name="rule"
                  placeholder="Правила"
                  type="email"
                  class="form-control input__profile subtitle fw-normal"
                  aria-describedby="emailHelp"
                />
              </div>
             
           
            <div class="row mt-4">
              <div class="col-lg-6">
                <input
                  name="header"
                  placeholder="Заголовок"
                  type="email"
                  class="form-control input__profile subtitle fw-normal"
                  aria-describedby="emailHelp"
                />
              </div>
            </div>
           
            <div class="row">
              <h2 class="title letter-spacing--none indent--row">Этапы</h2>
              <div class="col-lg-6">
                <input
                  name="tournament_start"  
                  placeholder="Дата начала турнира"
                  type="date"
                  class="form-control input__profile subtitle fw-normal"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="col-lg-6">
                <input
                  name="games_time"
                  placeholder=""
                  type="time"
                  class="form-control input__profile subtitle fw-normal"
                  id="exampleInputPassword1"
                />
              </div>
            
            </div>
            <div class="d-flex justify-content-center form-gap mt-4">
              <button class="forms__btn btn nav-link btn--orange">
                Опубликовать
              </button>
              <button class="forms__btn btn btn-primary nav-link">
                В черновики
              </button>
              <button class="forms__btn btn btn-primary nav-link">
                delete
              </button>
            </div>
          </form>
        </div>
      </main>
   @endsection