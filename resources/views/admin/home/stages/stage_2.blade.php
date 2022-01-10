@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{route('update_stage2_save', $turnir_id)}}">
        <div class="tab-content">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Турнир</th>
                        <th scope="col">Команда</th>

                        <th scope="col">Очки</th>
                        <th scope="col">Победитель</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($stages_2 as $stage_2)
                        <td>{{$stage_2->tournaments_name}}</td>
                        <td>{{$stage_2->team_name}} <input type="hidden" name="data[{{$stage_2->id }}][team_id]" value=" {{$stage_2->team_id}}"></td>


                        <td><input type="text" name="data[{{$stage_2->id }}][points]" value="{{$stage_2->points}}"></td>
                        <td><input type="text" name="data[{{$stage_2->id }}][winner]" value="{{$stage_2->winner}}"></td>
                    </tr>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </table>

</div>

</div>



@endsection