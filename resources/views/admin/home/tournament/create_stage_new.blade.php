@extends('admin.admin_layout')
@section('title', 'Создать этап')

@section('content')
    <div class="container">
        <h3>Создание этапа для - {{$turnir->name}}</h3>
        <form method="POST" action = "{{route('stoge.store')}}" >
            @csrf
            <input type="hidden" name="tournament_id" value="{{$turnir->id}}">
            <div class="form-group">
                <label for="exampleFormControlInput1">Название этапа</label>
                <input type="text" name="stage_name" class="form-control" id="exampleFormControlInput1" placeholder="">
                @error('stage_name')
                <div class="alert alert-danger">Введите Название этапа</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <a href="{{route('standings',[ $turnir->id])}}" class="btn btn-link">Назад</a>
    </div>
@endsection
