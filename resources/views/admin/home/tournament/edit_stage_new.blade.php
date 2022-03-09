@extends('admin.admin_layout')
@section('title', 'Создать этап')

@section('content')
    <div class="container">
        <h3>Редатирование этапа для - {{$stage->turnir->name}}</h3>
        <form method="POST" action = "{{route('stoge.update',$stage->id )}}" >
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label for="exampleFormControlInput1">Название этапа</label>
                <input type="text" name="stage_name" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$stage->stage_name}}">
                @error('stage_name')
                <div class="alert alert-danger">Введите Название этапа</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <a href="{{route('standings',[ $stage->tournament_id, $stage->id])}}" class="btn btn-link">Назад</a>
    </div>
@endsection
