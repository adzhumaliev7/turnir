@extends('admin.admin_layout')

@section('content')
<div class="container">
    <form action="{{route('update_stage3_save', $turnir_id)}}">
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
                        @foreach($stages_3 as $stage_3)
                        <td>{{$stage_3->tournaments_name}}</td>
                        <td>{{$stage_3->team_name}} <input type="hidden" name="data[{{$stage_3->id }}][team_id]" value=" {{$stage_3->team_id}}"></td>
                     
                        <td><input type="text" name="data[{{$stage_3->id }}][points]" value="{{$stage_3->points}}"></td>
                        <td><input type="text" name="data[{{$stage_3->id }}][winner]" value="{{$stage_3->winner}}"></td>
                    </tr>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </table>

</div>

</div>



@endsection