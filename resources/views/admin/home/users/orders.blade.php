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
               
                    <button type="button" class="btn btn-danger js-btn" data-id="Сообщение"  data-path="{{route('orders_rejected' ,$order->user_id )}}">
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