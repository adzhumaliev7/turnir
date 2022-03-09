@extends('admin.admin_layout')
@section('title', 'изменение матча')

@section('content')
    <div class="container">

        <form method="POST" action="{{route('matches.update')}}  " enctype="multipart/form-data">
            @csrf
            <input name="stage_id" type="hidden" value="{{$group->stage->id}}">
            <input name="group_id" type="hidden" value="{{$group->id}}">
            <input name="tournament_id" type="hidden" value="{{$group->turnir->id}}">
            <input name="deletedIds" id="deletedIds" type="hidden" value="">
            <div id="wrapMatches">
                @foreach($group->matches as $i => $matches)
                    <div class="matches" data-matches="{{$i + 1}}">
                        <h4>{{$matches->match_name}}</h4>
                        <input type="hidden" name="matches[{{$i}}][update]" value="{{$matches->id}}">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Название матча</label>
                                <input type="text" name="matches[{{$i}}][match_name]" class="form-control" placeholder="Введите название матча" value="{{$matches->match_name}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Login</label>
                                <input type="text" name="matches[{{$i}}][login]" class="form-control" placeholder="Введите Login матча" value="{{$matches->login}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Password</label>
                                <input type="text" name="matches[{{$i}}][password]" class="form-control" placeholder="Введите пароль матча" value="{{$matches->password}}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4"></label>
                                <span class="btn btn-danger form-control deleteMatches" data-matchesId="{{$matches->id}}">Удалить матч</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="save">
            <span id="addMatches" class="btn btn-primary"> Добавить ещё матч </span>

            <input type="submit" class="btn btn-danger" name="submit" value="draft"></input>
        </form>
        <a href="{{route('standings',[ $group->tournament_id, $group->stage_id, $group->id])}}" class="btn btn-link">Назад</a>
    </div>

@endsection
