@extends('admin.admin_layout')
@section('content')
<div class="container">
    <div class="row background-gray d-flex align-items-center row-indent-mr">
        <div class="col-lg-3">
            <div class="wrap">
                <img class="brd-img" src="http://placehold.it/224" alt="">
            </div>
        </div>
        <div class="col-lg-4">
         @foreach($datas as $data)
            <h1 class="title text-capitalize font-sz">{{$data->name}}</h1>

          
        @endforeach
        </div>

    </div>

    <ul class="nav nav-tabs nav-tabss" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link nav-btn " id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="true">Обзор</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link nav-btn " id="lineup-tab" data-bs-toggle="tab" data-bs-target="#lineup" type="button" role="tab" aria-controls="lineup" aria-selected="false">№№№№</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link nav-btn " id="lineup-tab" data-bs-toggle="tab" data-bs-target="#lineup1" type="button" role="tab" aria-controls="lineup" aria-selected="false">Турнирная таблица</button>
        </li>

    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab">
        @foreach($datas as $data)
        <p>Дата турнира: {{$data->tournament_start}}</p>
        <p>Количество слотов: {{$data->slot_kolvo}}</p>
        <p>Описание: {{$data->description}}</p>
        @endforeach
        </div>

       <div class="tab-pane fade" id="lineup" role="tabpanel" aria-labelledby="lineup-tab">
            <div class="block-view">
        22
            </div>
        </div>


        <div class="tab-pane fade  show active" id="lineup1" role="tabpanel" aria-labelledby="lineup-tab">
            <div class="block-view">
            <a href="{{route('create_stage', $turnir_id)}}" type="button" class="btn btn-success">Создать этап</a></br>
            @if($stages != null)
                @foreach($stages as $stage)
                     <a href="" type="button" class="btn">{{$stage->stage_name}}</a></br>
                     <a href="{{route('create_group', $turnir_id)}}" type="button" class="btn btn-success">Создать группу</a></br>
                @endforeach
            @else
            <h4>Нет этапов</h4>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    @endsection
  