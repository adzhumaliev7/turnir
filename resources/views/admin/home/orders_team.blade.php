@extends('admin.admin_layout')

@section('content')
@if($orders != "")

<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Старое название команды</th>
                <th scope="col">Новое название команды</th> 
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)

            <tr>
                <td scope="row">{{$order->team_id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->new_name}}</td>

                <td>
                    @if($order->status == 0) На рассмотрении
                    @elseif($order->status == 1) Принят
                    @else Отклонен
                    @endif
                </td>
                <td>
                    @if($order->status == 0)
                    <a href="" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter">Принять</a>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Новое название команды</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="{{route('orders_team_apply', $order->team_id)}}">
                                        @csrf
                                        <input name="name" id="" cols="50" rows="10" value="{{$order->new_name}}" disabled> </input>

                                </div>
                                <div class="modal-footer">

                                    <button type="btn" class="btn btn-primary">Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="" type="button"  data-toggle="modal" data-target="#exampleModalRejected" class="btn btn-danger"> Отклонить</a>
                    <div class="modal fade" id="exampleModalRejected" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Сообщение об отказе</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="{{route('orders_team_rejected', $order->team_id )}}">
                                        @csrf
                                        <textarea name="text" id="" cols="50" rows="10" value="" > </textarea>

                                </div>
                                <div class="modal-footer">

                                    <button type="btn" class="btn btn-primary">Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    @else
    <h4>Нет данных</h4>
    @endif
</div>
@endsection