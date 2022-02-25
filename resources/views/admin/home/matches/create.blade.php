@extends('admin.admin_layout')
@section('title', 'изменение матча')

@section('content')

    <div class="container">
        @include('errorMessage')
        <form method="POST" action="{{route('matches.matchesResultStore')}}  " enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tournamentGroupTeamsId" value="{{request()->route('teamId')}}">

            <h3>Упровления очками команды - {{$tournamentGroupTeam->team->name}}</h3>
            <h4>В этапе - {{$tournamentGroupTeam->stage->stage_name}}</h4>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">place_pts</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="place_pts" value="{{$tournamentGroupTeam->place_pts}}" placeholder="place_pts">
                </div>
            </div>

            <h2>Команда</h2>
            @foreach($tournamentGroupTeam->team->teammates->where('tournament_id',  $tournamentGroupTeam->turnir->id) as $t => $teammate)
                @foreach($tournamentGroupTeam->group->matches as $m => $matches)
                    <input type="hidden" name="matches[{{$teammate->id}}][{{$matches->id}}][team_id]" value="{{$teammate->id}}">
                    @php($temp = $teammate->matches->whereIn('match_id', $tournamentGroupTeam->group->matches->pluck('id', 'id'))->where('match_id', $matches->id)->first())

                    <h4> <span class="text-bold">Матч: </span> {{$matches->match_name}}. <span class="text-bold">Для игрока: </span> {{$teammate->user->name}}</h4>

                    <input type="hidden" name="matches[{{$teammate->id}}][{{$matches->id}}][team_id]" value="{{$teammate->id}}">
                    <input type="hidden" name="matches[{{$teammate->id}}][{{$matches->id}}][match_id]" value="{{$matches->id}}">
                    @if($temp)
                        <input type="hidden" name="matches[{{$teammate->id}}][{{$matches->id}}][update]" value="{{$temp->id}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">kills_pts</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="matches[{{$teammate->id}}][{{$matches->id}}][kills_pts]" value="{{$temp->kills_pts}}" placeholder="kills_pts">
                            </div>
                        </div>
                    @else
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">kills_pts</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="matches[{{$teammate->id}}][{{$matches->id}}][kills_pts]" value="0" placeholder="kills_pts">
                            </div>
                        </div>
                    @endif

                @endforeach
                    <hr>
            @endforeach
            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="save">
            <input type="submit" class="btn btn-danger" name="submit" value="draft"></input>
        </form>
    </div>

@endsection
