@if(Session::has('flash_meassage'))
                        <div class="alert alert-success" style="font-size: 16px;">{{Session::get('flash_meassage')}}</div>
                 @endif
                <form method="POST" action="{{route('orders_team_user', $team_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6">
                        <input name="name" placeholder="Название команды" type="tel" class="form-control  subtitle fw-normal input_border" id="">
                        <p></p>
                        <select name="country" id="" style="font-size: 16px;">
                            @foreach($countries as $country)
                            <option value="{{$country}}">{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
                </form>

                @if($networks != null)
                @foreach($networks as $network)
                <form method="POST" action="{{route('add_networks_update', $team_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <p></p>
                        <p></p>
                        <p></p>
                        <h2>Ссылки на социальные сети</h2>
                        <div class="col-lg-6">
                            <input name="insta" placeholder="instagram.com/" type="tel" class="form-control  subtitle fw-normal input_border" id="" value="{{$network->insta}}">
                            <input name="discord" placeholder="discord.com/" type="text" class="form-control  subtitle fw-normal input_border" id="" value="{{$network->discord}}">
                            <input name="vk" placeholder="vk.com/" type="text" class="form-control  subtitle fw-normal input_border" id="" value="{{$network->vk}}">
                            <input name="youtube" placeholder="youtube.com/" type="text" class="form-control  subtitle fw-normal input_border" id="" value="{{$network->youtube}}">
                        </div>
                    </div>
                    <button type="btn" class="btn  submit-btn btn--size btn--orange btn--margin" style="margin-right: 10px;">Сохранить</button>
                    <a href="{{route('delete_team', $team_id)}}" class="btn  submit-btn btn--size  btn--margin">Удалить команду</a>
                    <a href="" class="btn  submit-btn btn--size  btn--margin" data-toggle="modal" data-target="#ModalLogo">Установить логотип</a>
                </form>
                @endforeach
                @else
                <form method="POST" action="{{route('add_networks', $team_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <h2>Ссылки на социальные сети</h2>
                        <div class="col-lg-6">
                            <input name="insta" placeholder="instagram.com/" type="tel" class="form-control  subtitle fw-normal input_border" id="">
                            <input name="discord" placeholder="discord.com/" type="text" class="form-control  subtitle fw-normal input_border" id="">
                            <input name="vk" placeholder="vk.com/" type="text" class="form-control  subtitle fw-normal input_border" id="">
                            <input name="youtube" placeholder="youtube.com/" type="text" class="form-control  subtitle fw-normal input_border" id="">
                        </div>
                    </div>
                    <button type="btn" class="btn  submit-btn btn--size btn--orange btn--margin" style="margin-right: 10px;">Сохранить</button>
                    <a href="{{route('delete_team', $team_id)}}" class="btn  submit-btn btn--size  btn--margin">Удалить команду</a>
                    <a href="" class="btn  submit-btn btn--size  btn--margin" data-toggle="modal" data-target="#ModalLogo">Установить логотип</a>
                </form>
                @endif
                <div class="modal fade" id="ModalLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content" style="font-size: 16px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Загрузить логотип</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="font-size: 16px;">
                                <form method="POST" action="{{route('set_logo', $team_id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control input__profile subtitle fw-normal" id="fileInput" name="logo">

                                    <button type="btn" class="forms__btn btn nav-link btn--orange mt-4">Сохранить</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>