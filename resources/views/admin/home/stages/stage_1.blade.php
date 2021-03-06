@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{route('update_stage1_save', $turnir_id)}}">
        <div class="tab-content">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Турнир</th>
                        <th scope="col">Команда</th>
                        <th scope="col">Группа</th>
                        <th scope="col">Очки</th>
                        <th scope="col">Победитель</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($stages_1 as $stage_1)
                        <td>{{$stage_1->tournaments_name}}</td>
                        <td>{{$stage_1->team_name}} <input type="hidden" name="data[{{$stage_1->id }}][team_id]" value=" {{$stage_1->team_id}}"></td>
                        <td>{{$stage_1->group_id}} </td>

                        <td><input type="text" name="data[{{$stage_1->id }}][points]" value="{{$stage_1->points}}"></td>
                        <td><input type="text" name="data[{{$stage_1->id }}][winner]" value="{{$stage_1->winner}}"></td>
                    </tr>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </table>

</div>

</div>



@endsection