@extends('admin.admin_layout')
@section('title', 'Создать группу')

@section('content')

    <div class="container">
        <h3>Создание команды для - {{$turnir->name}}</h3>
        <h4>В этапе - {{$stage->stage_name}}</h4>
        <form method="POST" action = "{{route('team.store')}}" >
            @csrf

            <input type="hidden" name="group_id" value="{{request('groupId')}}">


            <div class="row">

                <div class="form-group col-6">
                    <label>Выбор команд для группы из заявок</label>
                    <div id="seclecter" class="demosdsdsd mb-3" style="">
                        <select class="form-control"  multiple="multiple" name="teams[]" placeholder="Выберите доступных играков" >
                            @foreach($teams as $team)
                                <option value="{{$team->team_id}}">{{$team->team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
