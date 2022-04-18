<div class="">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#stage_1">Турниры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#stage_2">Матчи</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="stage_1">

 
                       @if($tournaments != null)

                       
                            <table class="table" style="font-size: 16px;">
                                <thead class=" thead-light">
                                    <tr>
                                        <th scope="col">Турнир</th>
                                        <th scope="col">Участники</th>
                                        <th scope="col">Формат</th>
                                        <th scope="col">Дата</th>
                                    </tr>
                                </thead>
                                @foreach($tournaments as $turnir)
                                <tbody>
                                    <tr>
                                        <td>{{$turnir->turnir->name}}</td>
                                        <td>{{$turnir->members}}</td>
                                        <td>{{$turnir->turnir->format}}</td>
                                        <td>{{$turnir->turnir->tournament_start}} </td>
                                    </tr>
                                 </tbody>
                                @endforeach   
                            </table>
                          @else <h3>Турниров нет</h3>
                          @endif
                        </div>
                        <div class="tab-pane fade" id="stage_2">
                        @if($matches != null)
                            <table class="table" style="font-size: 16px;">
                                <thead class="thead-light">
                                @foreach($matches as $match)
                                    <tr>
                                        <th scope="col">{{$match->name}}#{{$loop->index +1}}.{{$match->stage_name}}.{{$match->match_name}}.Группа {{$match->group_name}}</th>
                                        <th scope="col">{{$match->format}}</th>
                                        <th scope="col">{{$match->date}}</th>
                                    </tr>
                                    @endforeach
                                </thead>
                                <tbody>
                                <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            </table>
                        @else <h3>Матчей нет</h3>
                          @endif
                    </div>
                </div>
            </div>