@if($route['delete'] ?? false)
<span>
    <form method="POST" action="{{$route['delete'], $id}}" accept-charset="UTF-8" class="d-inline-block">
        <input name="_method" type="hidden" value="DELETE">
        @csrf
        <button type="submit" class="delete btn p-0">
            <i class="fa fa-fw fa-times-circle text-danger"></i>
        </button>
    </form>
</span>
@endif
@if($route['edit'] ?? false)
<span class='ml-3'>
    <a href="{{route($route['edit'],$id)}}"> <i class='fa fa-pencil-alt' aria-hidden='true'></i> </a>
</span>
@endif
@if($route['show'] ?? false)
<span class='ml-3'>
    <a href="{{route($route['show'],$id)}}"> <i class='fa fa-eye' aria-hidden='true'></i> </a>
</span>
@endif
@if($route['duplicate'] ?? false)
    <span class='ml-3'>
    <a href="{{route($route['duplicate'],$id)}}"> <i class='fa fa-file-alt' aria-hidden='true'></i> </a>
</span>
@endif
@if($route['order'] ?? false)
    <span class='ml-3'>
    <a href="{{route($route['order'],$id)}}"> <i class='fa fa-users' aria-hidden='true'></i> </a>
</span>
@endif
@if($route['deleteGet'] ?? false)
    <span class='ml-3'>
    <a href="{{route($route['deleteGet'],$id)}}"> <i class="fa fa-fw fa-times-circle text-danger"></i> </a>
</span>
@endif
@if($route['ban'] ?? false)
    <span class='ml-3'>
        @if($status == 1)
            <i class="fa fa-fw fa-ban text-danger"  data-toggle="modal" data-target="#teamIdModal_{{$id}}"></i>
            <!-- Modal -->
            <div class="modal fade" id="teamIdModal_{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Бан</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route($route['ban'])}}" method="post" id="teamIdForm_{{$id}}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="ban_id" value="{{$id}}">
                                    <label for="exampleFormControlTextarea1">Причина бана</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('teamIdForm_{{$id}}').submit()">
                                Save changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @else

            <form id="teamIdForm_{{$id}}" action="{{route($route['ban'])}}" method="POST" class="d-none">
                @csrf
                 <input type="text" name="ban_id" value="{{$id}}">
            </form>

            <a onclick="event.preventDefault();document.getElementById('teamIdForm_{{$id}}').submit()">
                <i class="fa fa-fw fa-ban text-success"></i>
            </a>
        @endif
    </span>
@endif

