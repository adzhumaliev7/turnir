@extends('admin.admin_layout')
@section('title', 'Создать группу')

@section('content')
@include('errorMessage')
    <div class="container">
        @if (\Session::has('error_msg'))
            <div class="alert alert-danger"  style="font-size: 16px;">
                <ul>
                    <li>{!! \Session::get('error_msg') !!}</li>
                </ul>
            </div>
        @endif
        <h3>Создание команды для - {{$turnir->name}}</h3>
        <h4>В этапе - {{$stage->stage_name}} - Группа {{$group->group_name}}</h4>
        <input type="hidden" id="group_id" name="group_id" value="{{request('groupId')}}">

        <ul class="nav nav-tabs" role="tablist">
            <li class="active">
                <a href="#tab-table1" class="btn" data-toggle="tab">Из заявок</a>
            </li>
            <li>
                <a href="#tab-table2" class="btn" data-toggle="tab">Кроме заявок</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="tab-table1">
                <span class="btn btn-success mt-4 mb-2" id="button">Сохранить</span>

                <table id="example"  data-url="{{route('team.store')}}" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Удалить</th>
                        <th>Имя команды</th>
                        <th>Капитан команды</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $a)
{{--                        @dd($a)--}}
                        <tr>
                            <td>{{$a->team_id}}</td>
                            <td><a href="{{route('team.delete', $a->id)}}"> <i class="fa fa-fw fa-times-circle text-danger"></i> </a> </td>
                            <td>{{$a->team->name ?? 'Нету имени'}}</td>
                            <td>{{$a->team->сaptain->name ?? 'Нету имени'}}</td>
                        </tr>
                    @endforeach

                    </tfoot>
                </table>

            </div>
            <div class="tab-pane" id="tab-table2">

                <table data-turnirId="{{request('turnirId')}}" data-url="{{route('getDataTeamList')}}" class="teamTable table table-striped table-bordered">
                    <thead>
                    <th>Плюсик</th>
                    <th>#</th>
                    <th>Имя команды</th>
                    <th>Имя капитана</th>
                    </thead>
                </table>

            </div>
        </div>
    </div>
    <a href="{{route('standings',[ $turnir->id, $stage->id, $group->id])}}" class="btn btn-link">Назад</a>
<script>

</script>


@endsection
