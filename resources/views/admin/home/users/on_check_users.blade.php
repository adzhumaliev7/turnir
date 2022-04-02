@extends('admin.admin_layout')

@section('content')

    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">На проверке</h3>
        </div>

        <div class="card-body">
            <table data-url="{{route('getDataUserAllList')}}" data-filter="{{json_encode(['verification', 'on_check'])}}" class=" getDataUserAllList table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Ник</th>
                    <th>Почта</th>
                    <th>Статус</th>
                    <th>PUBG id</th>
                    <th>Команды</th>
                    <th>Инструменты</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
