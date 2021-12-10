<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>

    <!-- ! google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- css -->
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    
</head>
<body>
    
    <header>
        <div class="header-bg header header--person">
            <nav class="navbar navbar-expand-md navbar p-3 mb-5 bg-body rounded bg--none">
                <div class="container-fluid header-indent">
                    <a class="navbar-brand title text-uppercase logo-indent-mr text-white" href="{{ route('main') }}">snowmatch</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <img class="burger-btn" src="assets/img/burger.png" alt="">
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link nav-white" aria-current="page" href="{{ route('tournament') }}">Турниры</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link nav-white" aria-current="page" href="#">Рейтинг</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-white" aria-current="page" href="#">Помощь</a>
                        </li>              
                    </ul>

                     <a href="{{ route('profile') }}">   <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.3173 0C8.66574 0 0 8.66574 0 19.3173C0 23.9824 1.66258 28.2664 4.42624 31.6083C4.43332 31.6179 4.43396 31.6302 4.44169 31.6392C6.43717 34.0455 8.94327 35.8903 11.7359 37.0821C11.7681 37.0957 11.7997 37.1105 11.8318 37.124C12.0579 37.2193 12.2864 37.3075 12.5157 37.3938C12.6058 37.4279 12.696 37.4627 12.7874 37.4955C12.9851 37.5664 13.1841 37.6333 13.3843 37.6977C13.5125 37.7389 13.6406 37.7795 13.77 37.8181C13.9471 37.8709 14.1248 37.9218 14.3038 37.9701C14.4609 38.0126 14.6193 38.0519 14.7777 38.0899C14.9381 38.1285 15.099 38.1671 15.2607 38.2013C15.441 38.2399 15.6232 38.274 15.8061 38.3075C15.9529 38.3345 16.099 38.3629 16.2471 38.3867C16.45 38.4195 16.6541 38.4453 16.8589 38.4717C16.9909 38.4884 17.1222 38.5078 17.2549 38.5219C17.4867 38.5464 17.7204 38.5638 17.9548 38.5799C18.0636 38.5876 18.1718 38.5992 18.2813 38.605C18.6232 38.6243 18.9689 38.6346 19.3173 38.6346C19.6657 38.6346 20.0114 38.6243 20.3546 38.6063C20.4641 38.6005 20.5723 38.5889 20.6811 38.5812C20.9155 38.5644 21.1492 38.5477 21.381 38.5232C21.5137 38.509 21.645 38.4897 21.777 38.473C21.9818 38.4466 22.1859 38.4208 22.3888 38.388C22.5362 38.3642 22.683 38.3358 22.8298 38.3088C23.0121 38.2753 23.1943 38.2412 23.3752 38.2025C23.5368 38.1678 23.6972 38.1298 23.8582 38.0911C24.0166 38.0525 24.175 38.0132 24.3321 37.9714C24.5111 37.9237 24.6888 37.8722 24.8659 37.8194C24.9953 37.7808 25.1234 37.7402 25.2516 37.699C25.4518 37.6346 25.6508 37.5676 25.8485 37.4968C25.9393 37.464 26.0294 37.4292 26.1202 37.3951C26.3501 37.3088 26.578 37.2199 26.804 37.1253C26.8362 37.1118 26.8678 37.097 26.9 37.0834C29.692 35.8915 32.1987 34.0467 34.1942 31.6405C34.2019 31.6314 34.2026 31.6186 34.2097 31.6095C36.972 28.2664 38.6346 23.9824 38.6346 19.3173C38.6346 8.66574 29.9689 0 19.3173 0ZM27.1453 35.5567C27.1357 35.5612 27.1266 35.5664 27.117 35.5709C26.8871 35.6816 26.6534 35.7859 26.4177 35.8877C26.3643 35.9102 26.3115 35.9334 26.258 35.9559C26.052 36.0422 25.8433 36.124 25.6334 36.2026C25.5458 36.2354 25.4583 36.2676 25.3701 36.2985C25.184 36.3648 24.9972 36.4286 24.8086 36.4891C24.6914 36.5264 24.5735 36.5619 24.4557 36.5966C24.2883 36.6469 24.1202 36.6951 23.9502 36.7402C23.8073 36.7782 23.6631 36.813 23.5188 36.8471C23.3675 36.8832 23.2168 36.9199 23.0642 36.9521C22.8974 36.9875 22.7294 37.0177 22.562 37.048C22.4261 37.0731 22.2909 37.0995 22.1537 37.1214C21.9651 37.151 21.7745 37.1749 21.5845 37.1987C21.4641 37.2141 21.3443 37.2322 21.2226 37.245C21.0056 37.2682 20.7867 37.283 20.5684 37.2985C20.4712 37.3049 20.3746 37.3159 20.2761 37.321C19.9573 37.3378 19.638 37.3468 19.3173 37.3468C18.9966 37.3468 18.6773 37.3378 18.3592 37.321C18.2613 37.3159 18.1647 37.3056 18.0668 37.2985C17.8479 37.2837 17.6296 37.2682 17.4126 37.245C17.2909 37.2322 17.1712 37.2141 17.0507 37.1987C16.8608 37.1749 16.6702 37.151 16.4815 37.1214C16.3444 37.0995 16.2091 37.0731 16.0733 37.048C15.9052 37.0177 15.7372 36.9868 15.571 36.9521C15.4184 36.9199 15.2671 36.8832 15.1164 36.8471C14.9722 36.8123 14.828 36.7782 14.685 36.7402C14.5157 36.6951 14.347 36.6462 14.1795 36.5966C14.0617 36.5619 13.9439 36.5264 13.8267 36.4891C13.638 36.4286 13.4506 36.3648 13.2652 36.2985C13.177 36.2669 13.0894 36.2348 13.0018 36.2026C12.7919 36.124 12.5833 36.0422 12.3772 35.9559C12.3238 35.934 12.2716 35.9109 12.2182 35.8883C11.9825 35.7872 11.7488 35.6823 11.5183 35.5715C11.5086 35.567 11.4996 35.5625 11.4899 35.5574C9.24333 34.4704 7.2588 32.9276 5.64838 31.0539C6.89306 26.4705 10.4165 22.7757 14.9497 21.3057C15.0392 21.3604 15.1325 21.4094 15.2246 21.4609C15.2787 21.4911 15.3321 21.5233 15.3869 21.5523C15.5788 21.6541 15.7732 21.7494 15.9722 21.835C16.1248 21.902 16.2826 21.9586 16.4397 22.0166C16.4706 22.0275 16.5015 22.0398 16.5324 22.0507C17.4055 22.3598 18.3398 22.5369 19.3173 22.5369C20.2948 22.5369 21.2291 22.3598 22.1016 22.0507C22.1325 22.0398 22.1634 22.0275 22.1943 22.0166C22.3514 21.9586 22.5092 21.902 22.6618 21.835C22.8607 21.7494 23.0552 21.6541 23.2471 21.5523C23.3018 21.5227 23.3553 21.4911 23.4094 21.4609C23.5014 21.4094 23.5954 21.3604 23.6856 21.3051C28.2187 22.7757 31.7415 26.4705 32.9869 31.0532C31.3765 32.9263 29.3919 34.4692 27.1453 35.5567ZM12.2343 14.166C12.2343 10.2607 15.412 7.08301 19.3173 7.08301C23.2226 7.08301 26.4003 10.2607 26.4003 14.166C26.4003 16.6502 25.1119 18.8363 23.1705 20.1009C22.9168 20.2658 22.6528 20.4132 22.3817 20.542C22.3495 20.5575 22.3179 20.5736 22.2857 20.5884C20.421 21.4364 18.2136 21.4364 16.3489 20.5884C16.3167 20.5736 16.2845 20.5575 16.2529 20.542C15.9812 20.4132 15.7178 20.2658 15.4641 20.1009C13.5228 18.8363 12.2343 16.6502 12.2343 14.166ZM33.9527 29.8278C32.493 25.5175 29.1627 22.034 24.9077 20.3791C26.6096 18.846 27.6881 16.6322 27.6881 14.166C27.6881 9.55047 23.9329 5.79519 19.3173 5.79519C14.7018 5.79519 10.9465 9.55047 10.9465 14.166C10.9465 16.6322 12.025 18.846 13.7275 20.3791C9.47256 22.0346 6.14226 25.5175 4.68251 29.8278C2.54924 26.8665 1.28782 23.2374 1.28782 19.3173C1.28782 9.37597 9.37597 1.28782 19.3173 1.28782C29.2586 1.28782 37.3468 9.37597 37.3468 19.3173C37.3468 23.2374 36.0854 26.8665 33.9527 29.8278Z" fill="white"/>
                      </svg>
                    </a>        

                    </div>
                </div>
                </nav>     

            <div class="container header-container">
                <h1 class="header__slogan slogan slogan--line">Регистрируйся и побеждай!</h1>
                <p class="header__txt subtitle header__txt--color header__txt--margin">Ежедневные турниры с денежными призами</p>
                <button class="header__btn btn pubg__btn">Играть</button>

                <!-- <div class="block-ps" style="position: absolute;">
                    <img src="assets/img/school-girl.png" alt="">
                </div> -->

            </div>
            <!-- social icons -->
                <div class="social social-block">
                    <div class="social-flex">
    
                        <div class="social__block">
    
                            <div class="social__item">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
    
                            <div class="social__item">
                                <a href="#"><i class="fab fa-telegram"></i></a>
                            </div>
    
                            <div class="social__item">
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
    
                            <div class="social__item">
                                <a href="#"><i class="fab fa-discord"></i></a>
                            </div>
    
                        </div>
                         
                    </div>
                </div>

            </div>  
    </header>
<!-- ! разобраться с фото position absolute что бы фото было взаде текста -->
    <section>

        <!-- first item - 1 -->
        <div class="container">

            <div class="row d-flex justify-content-between">
                <div class="col-lg-6 my-3">
                    <div class="pubg">
                        <div class="pubg-img pubg-wrapper">
                            <div class="pubg-block">
                                <h4 class="pubg__title pubg__title--margin">Fastcup daily</h4>
                                <p class="pubg__text">24.09.20021 22:00 Nur-Sultan</p>
                                <span class="pubg__price">Призовой фонд: 100$</span>
                                <p class="pubg__text">Режим проведения: squad(4)</p>
                                <button class="pubg__btn pubg__btn--margin">Принять участие</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 my-3">
                    <div class="pubg pubg-2">
                        <div class="pubg-img pubg-wrapper pubg-img-2">
                            <div class="pubg-block">
                                <h4 class="pubg__title pubg__title--margin">Fastcup daily</h4>
                                <p class="pubg__text">24.09.20021 22:00 Nur-Sultan</p>
                                <span class="pubg__price">Призовой фонд: 100$</span>
                                <p class="pubg__text">Режим проведения: squad(4)</p>
                                <button class="pubg__btn pubg__btn--margin">Принять участие</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="col-lg-6 my-3">
                    <div class="pubg pubg-3">
                        <div class="pubg-img pubg-wrapper pubg-img-3">
                            <div class="pubg-block">
                                <h4 class="pubg__title pubg__title--margin">Fastcup daily</h4>
                                <p class="pubg__text">24.09.20021 22:00 Nur-Sultan</p>
                                <span class="pubg__price">Призовой фонд: 100$</span>
                                <p class="pubg__text">Режим проведения: squad(4)</p>
                                <button class="pubg__btn pubg__btn--margin">Принять участие</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 my-3">
                    <div class="pubg pubg-4">
                        <div class="pubg-img pubg-wrapper pubg-img-4">
                            <div class="pubg-block">
                                <h4 class="pubg__title pubg__title--margin">Fastcup daily</h4>
                                <p class="pubg__text">24.09.20021 22:00 Nur-Sultan</p>
                                <span class="pubg__price">Призовой фонд: 100$</span>
                                <p class="pubg__text">Режим проведения: squad(4)</p>
                                <button class="pubg__btn pubg__btn--margin">Принять участие</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <footer>
        <div class="footer">
            <div class="footer__inner">
                <div class="container">
                    <div class="row">
                        <div class="col"><a class="footer__link" href="#">О проекте</a></div>
                        <div class="col"><a class="footer__link" href="#">Сотрудничество</a></div>
                        <div class="col"><a class="footer__link" href="#">Помощь</a></div>
                        <div class="col"><a class="footer__link" href="#">Пользовательское соглашение</a></div>
                        <div class="col"><a class="footer__link" href="#">Правила и ограничения</a></div>
                        <!-- <div class="col">
                            <a href="#"><i class="fab fa-telegram footer__icons"></i></a>
                            <a href="#"><i class="fab fa-youtube footer__icons"></i></a>
                            <a href="#"><i class="fab fa-discord footer__icons"></i></a>
                            <a href="#"><i class="fab fa-instagram footer__icons"></i></a>
                        </div> -->
                    </div>
                    <div class="row">
                        <p class="footer__text">Showmatch.pro - киберспортивная турнирная платформа для мобильного гейминга</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>