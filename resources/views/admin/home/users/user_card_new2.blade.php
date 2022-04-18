@extends('admin.admin_layout')

@section('content')

    <div class="container">
    <a type="button" class="btn btn-success" href="{{route('allusers')}}" class="m-4" data-title="Подтвердить">К пользователям</a>
        <div class="row background-gray d-flex align-items-center row-indent-mr">
            <div class="col-lg-3">
                <div class="wrap">
                    @if($user->photo)
                    <img class="brd-img" src="{{ asset("uploads/storage/img/userslogo/$user->photo")}}" width="224" height="224" alt="">
                    @else
                    <img class="brd-img" src="{{ asset("uploads/storage/img/default/noimage.png")}}"  width="224" height="224" class="" style="opacity: .8">
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <h1 class="title text-capitalize font-sz">user_id: {{$user->id}}</h1>
                <h1 class="title text-capitalize font-sz">Ник: {{$user->name}}</h1>
               
            </div>
        </div>
        <h3>Общие</h3>
        <hr style="background-color: orange">

        <table class="table">
            <tbody>
                <tr>
                    <th>mail</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Статус</th>
                    <td>@if($user->status != null) Бан  @endif  {{$status}}</td>
                </tr>
                <tr>
                    <th>Команды</th>
                    <td>
                    {{$user->teamMembers->first()->team->name ?? ''}}
                    </td>
                </tr>
  
            </tbody>
        </table>

        <h3>Игровой профиль</h3>
        <hr style="background-color: orange">

        <table class="table">
            <tbody>
            <tr>
                    <th>Ник</th>
                    <td>{{$user->nickname}}</td>
                </tr>
                <tr>
                    <th>Игровой ID</th>
                    <td>{{$user->game_id}}</td>
                </tr>
                <tr>
                    <th>ФИО</th>
                    <td>{{$user->fio}}</td>
                </tr>
                <tr>
                    <th>Дата рождения</th>
                    <td>  @if($user->bdate != null)
                        {{Carbon\Carbon::parse($user->bdate)->format('d.m.Y')}} 
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Страна / Город</th>
                    <td>{{$user->country}} / {{$user->city}}</td>
                </tr>
                <tr>
                    <th>Телефон</th>
                    <td>{{$user->phone}}</td>
                </tr>
           
            </tbody>
        </table>
     
        <hr style="background-color: orange">

        <h3>Верификация</h3>
        <hr style="background-color: orange">

        <table class="table">
            <tbody>
            <tr>
                    <th>Верификация</th>
                    <td>  
                        @if($user->verification == 'verified')
                    вер
                @elseif($user->verification == 'rejected')
                    откл
                @elseif($user->verification == 'on_check')
                    На проверке
                @endif
                     </td>
                </tr>
              
            @if($user->verification== 'verified' || $user->verification== 'on_check')
                 <tr>
                    <th>Дата верификации</th>
                    <td>  
                   
                        @foreach($user->verifications->where('status', 1) as $item)
                        {{Carbon\Carbon::parse($item->date)->format('d.m.Y H:i:s')}}
                        @endforeach
                  
                     </td>
                </tr>
                <tr>
                    <th>Админ верификации</th>
                    <td>  
                   
                        @foreach($user->verifications->where('status', 1) as $item)
                        {{$item->moder_id}}
                         @endforeach
                        
                     </td>
                </tr>
                <tr>
                    <th>Документы</th>
                    <td>  
                    @if($user->doc_photo !=null && $user->doc_photo2 !=null)
                     <a id="myBtn" href="#" data-toggle="modal" data-target="#ModalPhoto">Просмотр докуметов</a></br>
                    @endif
                     </td>
                </tr>
                @endif 
                @if($user->doc_photo !=null && $user->doc_photo2 !=null && $user->verification =='on_check')
                </tr>
                 <th>Действие</th>
                 <td>  <a type="button" class="btn btn-success" href="{{ route('verified', $user->id) }}" class="message" data-title="Подтвердить">Подтвердить</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalRejected">
                     Отклонить
                    </button></td>
            </tr>

            @elseif($user->verification== 'rejected')
                <th>Дата отказа</th>
                    <td>  
                   
                         @foreach($user->verifications->where('status', 0) as $item)
                        {{Carbon\Carbon::parse($item->date)->format('d.m.Y H:i:s')}}
                        @endforeach
                  
                     </td>
                </tr>
                <tr>
                    <th>Админ </th>
                    <td>  
        
                        @foreach($user->verifications->where('status', 0) as $item)
                        {{$item->moder_id}}
                         @endforeach
                     </td>
                </tr>  
                <tr>    
                     <th>Причина отказа </th>
                    <td>  
        
                        @foreach($user->verifications->where('status', 0) as $item)
                        {{$item->description}}
                         @endforeach
                     </td>
                </tr>
             @endif   
            </tbody>
           
        </table>
      
        <hr style="background-color: orange">
        <h3 class="text-center">Логи</h3>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Дата</th>
                <th scope="col">Тип</th>
                <th scope="col">Причина</th>
                <th scope="col">Пред</th>
                <th scope="col">Новый</th>
                <th scope="col">Кто</th>
            </tr>
            </thead>
        <tbody>

            @foreach($logs as $log)
           
                <tr>
                    <th scope="row">{{$log->id}}</th>
                    <td>
                        @if($log->created_at)
                            {{$log->created_at->format('Y.m.d')}}
                        @endif
                    </td>
                    <td>
                        {{$log->type->description }}
                    </td>
                    <td>  {{$log->description ? $log->description : '' }} </td>
                    <td>
                    @if($log->table_name == 'logs')
                            @if($log->type->type == 'chengeNick')
                                {{$log->old_value ?? 'пользователь удалён'}}
                            @elseif($log->type->type == 'chengeGameId')
                                {{$log->old_value}}
                           
                        @elseif($log->table_name == 'reports')
                        @endif
                    @endif
                    </td>
                    <td>
                    @if($log->table_name == 'logs')
                            @if($log->type->type == 'chengeNick')
                                {{$log->new_value ?? 'пользователь удалён'}}
                            @elseif($log->type->type == 'chengeGameId')
                                {{$log->new_value}}

                         @elseif($log->table_name == 'reports')
                         @endif
                        @endif
                    </td>
                    <td>
                    </td>
                </tr>
            @endforeach
            </tbody>
          
        </table>
        <span class="d-flex justify-content-center">{{$logs->links()}}</span>


    </div>
    <div class="modal fade" id="ModalPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{ asset("uploads/storage/img/verification/$user->doc_photo")}}" width="400" height="350" class="" style="opacity: .8">
        <img src="{{ asset("uploads/storage/img/verification/$user->doc_photo2")}}" width="400" height="350" class="img2" style="opacity: .8">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalRejected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Сообщение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{route('rejected', $user->id)}}">
                <div class="modal-body">
                    @csrf
                    <textarea name="description" id="" cols="50" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="btn" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

