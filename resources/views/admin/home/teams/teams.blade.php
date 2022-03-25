@extends('admin.admin_layout')

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Список команд</h3>
        </div>

        <div class="card-body">
                <table data-url="{{route('getDataTeamAllList')}}" class="allTeamTable table table-bordered table-striped" data-order='[[ 0, "desc" ]]'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Команда</th>
                        <th>Участники (всего/игр)</th>
                        <th>Дата последнего турнира</th>
                        <th>кол-во турниров</th>
                        <th>Тимлид</th>
                        <th>почта тимлида</th>
                        <th>Инструменты</th>
                    </tr>
                    </thead>
                </table>
        </div>
    </div>
@endsection

