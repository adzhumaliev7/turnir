@extends('admin.admin_layout')

@section('content')
@if($orders != null)

<div class="container">
	@if (\Session::has('msg'))
    <div class="alert alert-danger">
       
            <p>{!! \Session::get('msg') !!}</p>

    </div>
@endif
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
                 <td scope="row">{{$loop->index+1}}</td>
                 <td>{{$order->old_name}}</td>
                <td>{{$order->new_name}}</td>
                <td>
                    @if($order->status == 0) На рассмотрении
                    @elseif($order->status == 1) Принят
                    @else Отклонен
                    @endif
                </td>
                <td>
                    @if($order->status == 0)
                    <button href="" class="btn btn-primary js-btn-apply"  data-id="{{$order->new_name}} " data-path="{{route('orders_team_apply',[$order->team_id, $order->old_name, $order->id])}}">Принять</button>
                    <button href="" type="button"  class="btn btn-danger js-btn" data-id="Сообщение об отказе" data-path="{{route('orders_team_rejected', $order->id )}}">Отклонить</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$orders->links()}}
    @else
    <h4>Нет данных</h4>
    @endif
</div>
@endsection