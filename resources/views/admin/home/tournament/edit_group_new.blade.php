@extends('admin.admin_layout')
@section('title', 'Создать группу')

@section('content')

    <div class="container mt-4">
        <h3>Редакирование группы для - {{$group->turnir->name}}</h3>
        <h4>В - {{$group->stage->stage_name}}</h4>
        <form method="POST" action = "{{route('group.update', $group->id)}}" >
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label for="exampleFormControlInput1">Название группы</label>
                <input type="text" name="group_name" class="form-control" placeholder="" value="{{$group->group_name}}">
                @error('group_name')
                <div class="alert alert-danger">Введите Название группы</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <a href="{{route('standings',[ $group->tournament_id, $group->stage_id, $group->id])}}" class="btn btn-link">Назад</a>
    </div>
@endsection
