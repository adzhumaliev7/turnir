@extends('admin.admin_layout')

@section('content')
@if($orders != "")

<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>


                <th scope="col">Почта</th>
                <th scope="col">Текст</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)

            <tr>
                <td scope="row">{{$order->user_id}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->text}}</td>
                <td>
                    @if($order->status == 0) На рассмотрении
                    @elseif($order->status == 1) Принят
                    @else Отклонен
                    @endif
                </td>
                <td>
                    @if($order->status == 0)
                    <a href="{{route('orders_apply',$order->user_id )}}" class="btn btn-primary">Принять</a>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Сообщение</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="{{route('orders_rejected' ,$order->user_id )}}">
                                        @csrf
                                        <textarea name="text" id="" cols="50" rows="10"></textarea>

                                </div>
                                <div class="modal-footer">

                                    <button type="btn" class="btn btn-primary">Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                        Отклонить
                    </button>
                    <!--  <a href="{{route('orders_rejected',$order->user_id )}}" class="btn btn-danger">Отклонить</a> -->
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