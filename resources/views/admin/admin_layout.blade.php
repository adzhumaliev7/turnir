<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("admin/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset("admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}  ">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset("admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset("admin/plugins/jqvmap/jqvmap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("admin/dist/css/adminlte.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset("admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset("admin/plugins/daterangepicker/daterangepicker.css")}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset("admin/plugins/summernote/summernote-bs4.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/jquery.dropdown.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/pinger.css")}}">
    <link rel="stylesheet" href="{{ asset("css/datepicker.min.css")}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>
<style>
    .table-box {
        max-width: 1024px;
        overflow-x: scroll;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset("admin/dist/img/AdminLTELogo.png")}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin')}}" class="brand-link">
        <img src="{{ asset("admin/dist/img/AdminLTELogo.png")}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Админ панель</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset("admin/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{route('admin')}}" class="d-block">Админ</a>
            <a href="{{route('main')}}" class="d-block">На сайт</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            @if($check == false)
            <li class="nav-item">
              <a href="{{route('moderators')}}" class="nav-link">
                <i class="nav-icon far fa-alt"></i>
                <p>
                  Модераторы
                </p>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
                <p>
                  Пользователи
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('allusers')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Все пользователи</p>
                  </a>
                </li>
               <li class="nav-item">
                  <a href="{{route('verifiedAt')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Верифицированные</p>
                  </a>
                </li> 
                <li class="nav-item">
                  <a href="{{route('verification')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ожидающие верификации</p>
                  </a>
                </li> 
                <li class="nav-item">
                  <a href="{{route('blocked')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Заблокированные </p>
                  </a>
                </li> 
              </ul>
            </li>

            <li class="nav-item">
              <a href="{{route('teams')}}" class="nav-link">
                <i class="nav-icon far fa-alt"></i>
                <p>
                  Команды
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('orders_team')}}" class="nav-link">
                <i class="nav-icon far fa-alt"></i>
                <p>
                  Редактирование названия команд  @if($orders_team != null) (<span style="color:#F23434"><bold>{{$orders_team}}</bold></span>) @endif
                </p>
                <p>
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
                <p>
                  Турниры
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin_tournament')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Активные турниры
                   
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('draft_tournament')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Черновики</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('log_apply_teams')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Лог принятых команд </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('log_rejected_teams')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Лог отклоненных команд</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
                <p>
                  Прочие
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('admin.help')}}" class="nav-link">
                <i class="nav-icon far fa-alt"></i>
                <p>
                  Помощь
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin_feedback')}}" class="nav-link">
                <i class="nav-icon far fa-alt"></i>
                <p>
                  Обратная связь
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.posts')}}" class="nav-link">
                <i class="nav-icon far fa-alt"></i>
                <p>
                  Новости
                </p>
              </a>
            </li>
              
            <li class="nav-item">
              <a href="{{route('admin.pages')}}" class="nav-link">
                <i class="nav-icon far fa-alt"></i>
                <p>
                  Генерация страниц 
                </p>
              </a>
            </li>

              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')

    </div>
    <div class="modal fade" id="ModalWindow">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalWindowTitle">Cообщение</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          @csrf
          <textarea name="text" id="" cols="50" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <button type="btn" class="btn btn-primary">Сохранить</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalApplyTeamName" >
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">Новое название команды</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="">
                                        @csrf
                                        <input name="name" id="exampleModalLongTitle" cols="50" rows="10" value="" readonly="readonly"> </input>
                                    
                                </div>
                                <div class="modal-footer">

                                    <button type="btn" class="btn btn-primary">Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset("admin/plugins/jquery/jquery.min.js")}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset("admin/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- ChartJS -->
    <script src="{{asset("admin/plugins/chart.js/Chart.min.js")}}"></script>
    <!-- Sparkline -->
    <script src="{{asset("admin/plugins/sparklines/sparkline.js")}}"></script>
    <!-- JQVMap -->
    <script src="{{asset("admin/plugins/jqvmap/jquery.vmap.min.js")}}"></script>
    <script src="{{asset("admin/plugins/jqvmap/maps/jquery.vmap.usa.js")}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset("admin/plugins/jquery-knob/jquery.knob.min.js")}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset("admin/plugins/moment/moment.min.js")}}"></script>
    <script src="{{asset("admin/plugins/daterangepicker/daterangepicker.js")}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset("admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
    <!-- Summernote -->
    <script src="{{asset("admin/plugins/summernote/summernote-bs4.min.js")}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset("admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset("admin/dist/js/adminlte.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("admin/dist/js/demo.js")}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset("admin/dist/js/pages/dashboard.js")}}"></script>

      <script src="{{asset("js/jquery.dropdown.min.js")}}"></script>
      <script src="{{asset("js/datepicker.min.js")}}"></script>

      <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>
      <script src="{{asset("js/scriptAdmin.js")}}"></script>

      <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
      <script>
      var editor = CKEDITOR.replace( 'ckeditor',{
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
        } );

        var editor = CKEDITOR.replace( 'ckeditor2',{
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
        } );
      </script>









    <script>




/* 
        $(document).ready(function() {
            $('.rules').summernote({
              disableDragAndDrop: true,
        height: 300,
        emptyPara: '',
        lang: 'ru-RU',
        toolbar: [
        ['codeview', ['codeview']],
        ['style', ['style']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
         ['insert',['picture','link','video','table']],
        ['view', ['fullscreen', 'codeview', 'help']],
        ['undo', ['undo']],
        ['redo', ['redo']],
        ],
      });
                editor.summernote(configFull);

});
function sendCMSFile(file) {
    if (file.type.includes('image')) {
        var name = file.name.split(".");
        name = name[0];
        var data = new FormData();
        data.append('action', 'imgUpload');
        data.append('file', file);
        $.ajax({
            url: "",
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'JSON',
            data: data,
            success: function (url) {
                $('#summernote').summernote('insertImage', url);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + " " + errorThrown);
            }
        });
    }
} */
    </script>

    <script>





    </script> 





   <script>
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>

   <script>
      const $modal = $('#ModalWindow');
      const $titleCont = $modal.find('#ModalWindowTitle');

      const $form = $modal.find('form');
      console.log($titleCont);
// тут ищите все кнопки (можно им какой-нибудь класс придумать уникальный, например js-btn-ban)
// далее в цикле вешаете события
      const buttons = document.querySelectorAll('.js-btn');
      buttons.forEach(currentButton => {
      currentButton.addEventListener('click', function() {
        const userId = this.dataset.id;
        const path = this.dataset.path;

        $titleCont.text(userId); // выводим id пользователя
        $form.attr('action', path); // обновляем роут
        $modal.modal('show'); //показываем модалку
    });
});
    </script>

    <script>
      const $modal1 = $('#ModalApplyTeamName');
      //const $titleCont1 =  document.getElementById('#exampleModalLongTitle');
      const inputType = document.querySelector('input[name="name"]');
      const $form1 = $modal1.find('form');

// тут ищите все кнопки (можно им какой-нибудь класс придумать уникальный, например js-btn-ban)
// далее в цикле вешаете события
      const buttons1 = document.querySelectorAll('.js-btn-apply');
      buttons1.forEach(currentButton => {
      currentButton.addEventListener('click', function() {
        const userId1 = this.dataset.id;
        const path1 = this.dataset.path;
        //$titleCont1.value=userId1; // выводим id пользователя
        inputType.value = userId1;
        $form1.attr('action', path1); // обновляем роут
        $modal1.modal('show'); //показываем модалку
    });
});
    </script>

    <script>

        $(document).on('click', '.datepickerInput', function (event) {
            var myDatepicker = $(event.target).datepicker({
                timepicker: true,
                clearButton: true,
                minDate: new Date(),
                dateTimeSeparator: " "
            }).data('datepicker');

            myDatepicker.show();
        });
        // $('.datepickerInput').datepicker({
        //     timepicker: true,
        //     clearButton: true,
        //     minDate: new Date(),
        //     // altField: $('input[name="date_en"]'),
        //     dateTimeSeparator: " "
        // });
        $('input[name="start_reg"]').datepicker({
            timepicker: true,
            clearButton: true,
            minDate: new Date(),
            dateTimeSeparator: " "
        });

        $('input[name="end_reg"]').datepicker({
            timepicker: true,
            clearButton: true,
            minDate: new Date(),
            dateTimeSeparator: " "
        });


          function format ( d ) {
            let turnirId = $('.usersTable').data('turnirid')
            let teamId = d.id
              console.log(d)
              if( d.members.length) {
                  let tr = ''
                  for (index = 0; index < d.members.length ?? []; ++index) {
                      // console.log(d.members[index])
                      tr += ` <tr>
                        <td>${d.members[index].user.name} </td>
                        <td><input type="checkbox" name="members[]" value="${d.members[index]['user_id']}"></td>
                    </tr`
                  }
                  // `d` is the original data object for the row
                  return `<form method="POST" action="/admin_panel/team/join/${turnirId}/${teamId}" >
                    <input type="hidden" name="_token" value="${$('meta[name="_token"]').attr('content')}">
                    <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">
                        ${tr}
                    </table>
                    <button type="btn" class="btn btn-success mt-4">Сохранить</button>
                </form>`
              } else {
                  return 'Нет участников'
              }
          }

          $('.usersTable').on('click', 'tbody td.dt-control', function () {
              var tr = $(this).closest('tr');
              var row = usersTable.row( tr );

              if ( row.child.isShown() ) {
                  // This row is already open - close it
                  row.child.hide();
              }
              else {
                  // Open this row
                  row.child( format(row.data()) ).show();
              }
          } );

          $('.usersTable').on('requestChild.dt', function(e, row) {
              row.child(format(row.data())).show();
          })

          let usersTable = $('.usersTable').DataTable({
              "responsive": true,
              "autoWidth": false,
              "processing": true,
              "serverSide": true,
              "rowId": 'id',
              "ajax":{
                  "url": "{{route('getDataTeamList')}}",
                  "data": {"turnirId": $('.usersTable').data('turnirid')},
              },
              "columns": [
                  {
                      "className":      'dt-control',
                      "orderable":      false,
                      "data":           null,
                      "defaultContent": ''
                  },
                  { "data": "id" },
                  { "data": "name" },
                  { "data": "nameCapitane" }
              ],
              "order": [[1, 'asc']]
          });


          $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
              $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
          } );

          var table = $('#example').DataTable();

          $('#example tbody').on( 'click', 'tr', function () {
              $(this).toggleClass('selected');
          } );

          $('#button').click( function () {
              let group_id = $('#group_id').val()

              let teams = []
              for (index = 0; index < table.rows('.selected').data().length; ++index) {
                  teams.push(table.rows('.selected').data()[index][0])
              }

              $.ajax({
                  url: "{{route('team.store')}}",
                  method: "POST",
                  headers: {
                      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                  },
                  data: {"group_id": group_id,"teams": teams},
                  success: function(data) {
                      window.location.reload ()
                  }
              })

              console.log( table.rows('.selected').data())
          } );



          $('#addMatches').on('click', (ev) => {
              let matches = $('.matches').last();
              let count = 1;
              if(matches.length != 0)  {
                  count = matches.data().matches + 1
              }


              let html = `

                 <div class="matches" data-matches="${count}">
                    <h4>Матч ${count}</h4>
                    <div class="form-row">

                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Название матча</label>
                            <input type="text" name="matches[${count}][match_name]" class="form-control" placeholder="Введите название матча" value="Матч ${count}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Login</label>
                            <input type="text" name="matches[${count}][login]" class="form-control" placeholder="Введите Login матча" value="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Password</label>
                            <input type="text" name="matches[${count}][password]" class="form-control" placeholder="Введите пароль матча" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Дата</label>
                            <input type="text" name="matches[${count}][date]" class="form-control datepickerInput datepicker-here" placeholder="Дата матча" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4"></label>
                            <span class="btn btn-danger form-control deleteMatches2">Удалить матч</span>
                        </div>
                    </div>
                </div>

              `
              $('#wrapMatches').append(html)

          })
          let ids = [];
          $('.deleteMatches').on('click', (ev) => {
              let id = ev.target.dataset.matchesid;
              ids.push(id);
              let elem = $('#deletedIds').val(JSON.stringify(ids));
              console.log(elem)
              console.log(id)
              ev.target.parentNode.parentNode.parentNode.remove()
          })

          $(document).on('click', '.deleteMatches2',(ev) => {
              ev.target.parentNode.parentNode.parentNode.remove()
          })

          $('.demosdsdsd').dropdown({
              input:'<input type="text" maxLength="20" placeholder="Поиск">',
              searchNoData: '<li style="color:#ddd">Нет результатов</li>',
          });

          $(document).ready(function(){
              $('#search').on('keyup', function(){
                var query = $($this).val();
                $.ajax({
                  url:"search",
                  type:"GET",
                  data:{'search':query},
                  success:function(data){
                    $('#search_result').html(data);
                  }
                });
              });
          });

    </script>
    <script src="https://unpkg.com/scrollbooster@2/dist/scrollbooster.min.js"></script>
    <script>
new ScrollBooster({
  viewport: document.querySelector('.example1-viewport'),
  content: document.querySelector('.example1-content'),
  scrollMode: 'transform', // use CSS 'transform' property
  direction: 'horizontal', // allow only horizontal scrolling
  emulateScroll: true, // scroll on wheel events
});
</script>
</body>

</html>
