<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="discription" content= '@yield("description")' >
  <title> @yield('title')</title>

  <!-- ! google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="application/javascript"></script>
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js" type="application/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset("js/script.js")}}"></script>

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- css -->
  
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LHC5L7E68E"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LHC5L7E68E');
</script>
  
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]function(){(m[i].a=m[i].a[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(88689831, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/88689831" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


  <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{ asset("css/pinger.css")}}">
</head>

<body>
  <div class="wrapper">
    <header class="header header-pubg__bg-2">

      <div id="menu" class="">

        <nav class="main-nav">

          <div class="logo">
            <a href="index.html" class="title text-light crs-pointer">bigplay</a>
          </div>

          <div class="blocks-icons">

            <button class="button--none">
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="pubg-icons svg-inline--fa fa-user fa-w-15" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
              </svg>
            </button>

            <button class="button--none clr">
              <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="searchengin" class="pubg-icons svg-inline--fa fa-searchengin fa-w-15" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460 512">
                <path fill="currentColor" d="M220.6 130.3l-67.2 28.2V43.2L98.7 233.5l54.7-24.2v130.3l67.2-209.3zm-83.2-96.7l-1.3 4.7-15.2 52.9C80.6 106.7 52 145.8 52 191.5c0 52.3 34.3 95.9 83.4 105.5v53.6C57.5 340.1 0 272.4 0 191.6c0-80.5 59.8-147.2 137.4-158zm311.4 447.2c-11.2 11.2-23.1 12.3-28.6 10.5-5.4-1.8-27.1-19.9-60.4-44.4-33.3-24.6-33.6-35.7-43-56.7-9.4-20.9-30.4-42.6-57.5-52.4l-9.7-14.7c-24.7 16.9-53 26.9-81.3 28.7l2.1-6.6 15.9-49.5c46.5-11.9 80.9-54 80.9-104.2 0-54.5-38.4-102.1-96-107.1V32.3C254.4 37.4 320 106.8 320 191.6c0 33.6-11.2 64.7-29 90.4l14.6 9.6c9.8 27.1 31.5 48 52.4 57.4s32.2 9.7 56.8 43c24.6 33.2 42.7 54.9 44.5 60.3s.7 17.3-10.5 28.5zm-9.9-17.9c0-4.4-3.6-8-8-8s-8 3.6-8 8 3.6 8 8 8 8-3.6 8-8z"></path>
              </svg>
            </button>

            <button class="toggle-menu03 active toggle-menu02">
              <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="eye-slash" class="pubg-icons svg-inline--fa fa-eye-slash fa-w-15" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <path fill="currentColor" d="M634 471L36 3.51A16 16 0 0 0 13.51 6l-10 12.49A16 16 0 0 0 6 41l598 467.49a16 16 0 0 0 22.49-2.49l10-12.49A16 16 0 0 0 634 471zM296.79 146.47l134.79 105.38C429.36 191.91 380.48 144 320 144a112.26 112.26 0 0 0-23.21 2.47zm46.42 219.07L208.42 260.16C210.65 320.09 259.53 368 320 368a113 113 0 0 0 23.21-2.46zM320 112c98.65 0 189.09 55 237.93 144a285.53 285.53 0 0 1-44 60.2l37.74 29.5a333.7 333.7 0 0 0 52.9-75.11 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64c-36.7 0-71.71 7-104.63 18.81l46.41 36.29c18.94-4.3 38.34-7.1 58.22-7.1zm0 288c-98.65 0-189.08-55-237.93-144a285.47 285.47 0 0 1 44.05-60.19l-37.74-29.5a333.6 333.6 0 0 0-52.89 75.1 32.35 32.35 0 0 0 0 29.19C89.72 376.41 197.08 448 320 448c36.7 0 71.71-7.05 104.63-18.81l-46.41-36.28C359.28 397.2 339.89 400 320 400z"></path>
              </svg>
            </button>

          </div>

          <ul class="text-center">
            <li>
              <a class="main__link" href="{{route('tournament')}}">
                Турниры
              </a>
            </li>
            <li>
              <a class="main__link" href="{{route('rating')}}">
                Рейтинг
              </a>
            </li>

            <li>
              <a class="main__link" href="{{route('main.help')}}">
                Помощь
              </a>
            </li>
          </ul>
        </nav>

      </div>
    </header>
      @yield('content')
      <footer class="footer">
        <div class="footer__inner">
          <div class="container">
            <div class="row footer--index">
              <div class="col-lg-3 px-4">
                 <h4 class="title text-uppercase logo-indent-mr text-light footer__txt-mt">
                  bigplay
                </h4>
                <p class="footer__text text-light footer--subtext">
                Bigplay.pro - киберспортивная турнирная платформа для
                  мобильного гейминга
                </p>
              </div>
               <div class="col-lg-3 px-4 d-flex flex-column">
                <a class="footer__link footer__txt-mt text-light" href="#">Сотрудничество</a>
                <a class="footer__sublink" href="{{route('terms')}}">Пользовательское соглашение</a>
                <a class="footer__sublink" href="{{route('main.help')}}">Помощь</a>
              </div>
              <div class="col-lg-3 px-4 d-flex flex-column">
                <a class="footer__link footer__txt-mt text-light" href="">Правила и ограничения</a>
               @foreach($pages as $page)
                   <a class="footer__sublink" href="{{route('page', [$page->page, $page->id])}}">{{$page->title}}</a>
               @endforeach    
              </div>
              <div class="col-lg-3 px-4 d-flex flex-column">
                <a class="footer__link footer__txt-mt text-light" href="#">Подписывайтесь на нас</a>
                <div class="block d-flex justify-content-start w-100">
                  <a class="footer__social-icons footer__social-icons--indent footer__social-icons--telegram" href="https://t.me/+3gpT2AO3-I03NTZi"><i class="fab fa-telegram footer__icons"></i></a>
                  <a class="footer__social-icons footer__social-icons--indent footer__social-icons--discord" href="https://discord.gg/ASxHzZnxRJ"><i class="fab fa-discord footer__icons"></i></a>
                  <a class="footer__social-icons footer__social-icons--instagram" href="https://www.instagram.com/bigplay.gg/"><i class="fab fa-instagram footer__icons"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
  </div>
     
  <script type="application/javascript">
   let timessss = $('#timesssssssss').data('time')
let dataaaaa = Date.now();
    $('[data-countdown]').each(function () {
        var $this = $(this);
        var finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function (event) {
            // console.log(event.strftime('%D дней %H:%M:%S'))
            $this.html(event.strftime('%D дней %H:%M:%S'));
          
                if (event.timeStamp > timessss && dataaaaa < timessss) {
                   
                 setTimeout(location.reload(),15000);
                 location.reload();
                }
        });
    });
      </script>

<script>
     const nav = qs('tab');
     console.log(nav)
        if (nav && document.getElementById(nav)) {
          document.getElementById(nav).click()
        }
      
      function qs(key) {
        key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, '\\$&');
        var match = location.search.match(new RegExp('[?&]'+key+'=([^&]+)(&|$)'));
        return match && decodeURIComponent(match[1].replace(/\+/g, ''));
      }
      
      $('#nav-tab .accordion__btn').on('click', function (e) {
        var url = window.location.href;       
        var urlSplit = url.split( '?' );       
        var obj = { title : '', url: urlSplit[0] + '?tab=' + this.getAttribute('id')};       
        history.pushState(obj, obj.title, obj.url);
      })
    </script>


      <script>
    function viewdiv(id) {
        var el = document.getElementById(id);
        var link = document.getElementById('toggleLink');
        if (el.style.display == "block") {
            el.style.display = "none";
            link.innerText = link.getAttribute('data-text-hide');
        } else {
            el.style.display = "block";
            link.innerText = link.getAttribute('data-text-show');
        }
    }

</script>
<!-- <script>
         $('#changepassword').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:  e.target.action,
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data){
                 
                },
                error: function (data) {
 
                }
            });
        }); 
    </script> -->
<!-- <script type="text/javascript">
       $(document).ready(function() {
           $(".btn-submit").click(function(e){
               e.preventDefault();
               var _token = $("input[name='_token']").val();
               var old_password = $("input[name='old_password']").val();
               var password = $("input[name='password']").val();
               var password_confirmation = $("input[name='password_confirmation']").val();
               
          
               $.ajax({
                   url: "{{ route('changepassword') }}",
                   type:'POST',
                   data: {_token:_token, old_password:old_password, password:password, password_confirmation:password_confirmation},
                   success: function(data) {
                       if($.isEmptyObject(data.error)){
                           alert(data.success);
                       }else{
                           printErrorMsg(data.error);
                       }
                   }
               });
          
           }); 
          
           function printErrorMsg (msg) {
               $(".print-error-msg").find("ul").html('');
               $(".print-error-msg").css('display','block');
               $.each( msg, function( key, value ) {
                   $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
               });
           }
       });
   
   
   </script> -->
   <script type="text/javascript">
       
       $(document).ready(function() {
           $(".btn-submit").click(function(e){
               e.preventDefault();
          
               var _token = $("input[name='_token']").val();
               var oldpassword = $("input[name='oldpassword']").val();
               var password = $("input[name='password']").val();
               var password_confirmation = $("input[name='password_confirmation']").val();
            
               $.ajax({
                   url: "{{ route('changepassword') }}",
                   type:'POST',
                   data: {_token:_token, oldpassword:oldpassword, password:password, password_confirmation:password_confirmation},
                   success: function(data) {
                       if($.isEmptyObject(data.error)){
                           alert(data.success);
                       }else{
                           printErrorMsg(data.error);
                       }
                   }
               });
          
           }); 
          
           function printErrorMsg (msg) {
               $(".print-error-msg").find("ul").html('');
               $(".print-error-msg").css('display','block');
               $.each( msg, function( key, value ) {
                   $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
               });
           }
       });
   
   </script>

   <script src="https://unpkg.com/scrollbooster@2/dist/scrollbooster.min.js"></script>
    <script>
new ScrollBooster({
  viewport: document.querySelector('.example1-viewport'),
  content: document.querySelector('.example1-content'),
  scrollMode: 'native',
  direction: 'horizontal'
});
</script>
  
<!--  -->
</body>

</html>
