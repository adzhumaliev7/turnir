@extends('admin.admin_layout')
@section('title', 'Создать группу')

@section('content')

    <div class="container mt-4">
        <h3>Создание группы для - {{$turnit->name}}</h3>
        <h4>В - {{$stage->stage_name}}</h4>
        <form method="POST" action = "{{route('group.store')}}" >
            @csrf
            <input type="hidden" name="tournament_id" value="{{$turnit->id}}">
            <input type="hidden" name="stage_id" value="{{$stage->id}}">
            <div class="form-group">
                <label for="exampleFormControlInput1">Название группы</label>
                <input type="text" name="group_name" class="form-control" id="exampleFormControlInput1" placeholder="">
                @error('stage_name')
                <div class="alert alert-danger">Введите Название группы</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
