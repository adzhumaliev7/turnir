@if(Session::has('flash_meassage'))
        <div class="alert alert-success" style="font-size: 16px;">{{Session::get('flash_meassage')}}</div>
@endif
                 @if($tournaments != null)
    @foreach($tournaments as $turnir)

        @if($turnir->turnir->active == 1)    
            <?$disabled = 'disabled';?>
        @else
        <?$disabled = '';?>
        @endif
    @endforeach
 @else   
    <?$disabled = '';?>
    @endif  
        @if($disabled == 'disabled')
            <div class="alert alert-danger" style="font-size: 16px;">Во время проведения турнира редактирование недоступно</div>
        @endif
                <form method="POST" action="{{route('orders_team_user', $team_id)}}" enctype="multipart/form-data">
                <fieldset  <?echo $disabled;?>>
                    @csrf
                    <div class="col-lg-6">
                        <input name="name" placeholder="Название команды" type="tel" class="form-control  subtitle fw-normal input_border input_styles" id="">
                         @foreach($data as $item)
                        <input name="oldname"  type="hidden" value="{{$item->name}}">
                        @endforeach
                        <p></p>
                        <select name="country" id="" style="font-size: 16px;">
                            @foreach($countries as $country)
                            <option value="{{$country}}">{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="btn" class="btn  submit-btn  mt-4">Сохранить</button>
                </fieldset >
                </form>

                @if($networks != null)
                @foreach($networks as $network)
                <form method="POST" action="{{route('add_networks_update', $team_id)}}" enctype="multipart/form-data">
                <fieldset  <?echo $disabled;?>>
                    @csrf
                    <div class="row mt-4">
                        <p></p>
                        <p></p>
                        <p></p>
                        <h2>Ссылки на социальные сети</h2>
                        <div class="col-lg-6">
                            <input name="insta" placeholder="instagram.com/" type="tel" class="form-control input_styles  subtitle fw-normal input_border" id="" value="{{$network->insta}}">
                            <input name="discord" placeholder="discord.com/" type="text" class="form-control  input_styles subtitle fw-normal input_border" id="" value="{{$network->discord}}">
                            <input name="vk" placeholder="vk.com/" type="text" class="form-control  subtitle input_styles fw-normal input_border" id="" value="{{$network->vk}}">
                            <input name="youtube" placeholder="youtube.com/" type="text" class="form-control  input_styles subtitle fw-normal input_border" id="" value="{{$network->youtube}}">
                        </div>
                    </div>
                    <button type="btn" class="btn  submit-btn  mt-4" style="margin-right: 10px;">Сохранить</button>
                    <a href="" class="btn  submit-btn  mt-4" onclick= "return alert2();">Удалить команду</a>
                    
                    </fieldset >
                </form>
                @endforeach
                @else
                <form method="POST" action="{{route('add_networks', $team_id)}}" enctype="multipart/form-data">
                <fieldset  <?echo $disabled;?>>
                    @csrf
                    <div class="row mt-4">
                        <h2>Ссылки на социальные сети</h2>
                        <div class="col-lg-6">
                            <input name="insta" placeholder="instagram.com/" type="tel" class="form-control  input_styles subtitle fw-normal input_border" id="">
                            <input name="discord" placeholder="discord.com/" type="text" class="form-control input_styles  subtitle fw-normal input_border" id="">
                            <input name="vk" placeholder="vk.com/" type="text" class="form-control  subtitle input_styles fw-normal input_border" id="">
                            <input name="youtube" placeholder="youtube.com/" type="text" class="form-control input_styles  subtitle fw-normal input_border" id="">
                        </div>
                    </div>
                    <button type="btn" class="btn  submit-btn  mt-4" style="margin-right: 10px;">Сохранить</button>
                    <a href="" class="btn  submit-btn  mt-4" onclick="return alert2();">Удалить команду</a>
                  
                    </fieldset >
                </form>
                @endif
               

                <script>
                function alert2(){
                    if(confirm("Сначала выберете нового тимлида") ){
     
                     
                    }
            }
            </script>