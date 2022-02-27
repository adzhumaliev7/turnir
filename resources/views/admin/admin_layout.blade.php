<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <a href="#" class="d-block">Админ</a>
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


            <li class="nav-item">
              <a href="{{route('moderators')}}" class="nav-link">
                <i class="nav-icon far fa-alt"></i>
                <p>
                  Модераторы

                </p>
              </a>
            </li>

            <li class="nav-item menu-is-opening menu-open">
              <a href="#" class="nav-link">

                <p>
                  Пользователи
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item">
                  <a href="{{route('allusers')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Все пользователи</p>
                  </a>
                </li>
              <!--   <li class="nav-item">
                  <a href="{{route('users')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Верификация</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="{{route('orders')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Заявки</p>
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
              <a href="{{route('help')}}" class="nav-link">
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
            <li class="nav-item menu-is-opening menu-open">
              <a href="#" class="nav-link">

                <p>
                  Турниры

                </p>
              </a>
              <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item">
                  <a href="{{route('admin_tournament')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Активные турниры</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('draft_tournament')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Черновики</p>
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


      <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


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


              $('.example').DataTable();

          var table = $('#example').DataTable();

          $('#example tbody').on( 'click', 'tr', function () {
              $(this).toggleClass('selected');
          } );

          $('#button').click( function () {
              console.log( table.rows('.selected').data())
              alert( table.rows('.selected').data().length +' row(s) selected' );
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

                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Название матча</label>
                            <input type="text" name="matches[${count}][match_name]" class="form-control" placeholder="Введите название матча" value="Матч ${count}">
                        </div>
                        <div class="form-group col-md-3">
                                <label for="inputEmail4">Login</label>
                                <input type="text" name="matches[${count}][login]" class="form-control" placeholder="Введите Login матча" value="">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Password</label>
                                <input type="text" name="matches[${count}][password]" class="form-control" placeholder="Введите пароль матча" value="">
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



      </script>









</body>

</html>
