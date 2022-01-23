@extends('layouts.layout')
@section('title', 'Турнир')
@section('content')




<div class="main-container">
    <header class="header-container-2 profile-bg h-100 header margin--none">

        <div class="header-pubg__bg-2">
            <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">

                <!-- text start -->

                <!-- text end -->

                <div class="dropdown">
                    @if($mail != null)
                    <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{$mail->email}}
                    </button>
                    @else
                    <a href="{{'login'}}" class="header__line header__txt " type="button">
                        Войти
                    </a>
                    <a href="{{'registration'}}" class="header__line header__txt " type="button">
                        Регистрация
                    </a>
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>
                        <li><a class="dropdown-item header__txt text-dark" href="{{route('user.logout')}}">выйти</a></li>
                    </ul>
                </div>
            </div>
            <nav class=" navbar navbar-expand-md navbar p-3 bg-body rounded bg--none navbar-z">
                <div class=" container-fluid header-indent">
                    <a class="navbar-brand title text-uppercase logo-indent-mr text-white pubg-hover px-2" href="{{route('main')}}">showmatch</a>
                    <button class="toggle-menu toggle-click button--none">
                        <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav w-100 justify-content-end">
                            <li class="nav-item nav-item--active">
                                <a class="nav__link-active nav-link nav-white pubg-hover" aria-current="page" href="{{route('tournament')}}">Турниры</a>
                            </li>

                            <li class="nav-item nav-item--active">
                                <a class="nav-link nav-white pubg-hover" aria-current="page" href="{{route('rating')}}">Рейтинг</a>
                            </li>

                            <li class="nav-item nav-item--active ">
                                <a class=" nav-link nav-white pubg-hover" aria-current="page" href="#">Помощь</a>
                            </li>
                            <li class="nav-item nav-item--active ">
                                <a class=" nav-link nav-white pubg-hover" aria-current="page" href="{{route('feedback')}}">Обратная связь</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


        <main class="d-flex flex-column ">

            <h1 class="title text-capitalize font-sz text--responsive text-light px-4">Рейтинг</h1>

            <table class="table indent--row table-block ">
                <tbody>
                    <tr class="border-b border--none">
                        <td></td>
                        <td class="subtitle pubg-bg--orange border--none">Последняя игра</td>
                        <td class="subtitle pubg-bg--orange border--none">Страна</td>
                        <td class="subtitle pubg-bg--orange border--none">Тrnts</td>
                        <td class="subtitle pubg-bg--orange border--none">Kills</td>
                        <td class="subtitle bg--pubg-orange border--none">Points</td>
                    </tr>

                    <tr class="bg-orange">

                        <!-- cell 1 -->
                        @if($teams != NULL)
                        @foreach($teams as $team)
                        <th class="subtitle fw-meduim" scope="row">
                            {{$team->name}}
                        </th>
                        <td class="subtitle fw-meduim">
                            {{$team->tournament_start}} {{$team->timezone}}
                        </td>
                        <td class="subtitle fw-meduim">

                        </td>
                        <td class="subtitle fw-meduim">

                        </td>
                        <td class="subtitle fw-meduim">

                        </td>
                        <td class="subtitle fw-meduim">
                            {{$team->points}}
                        </td>

                        @endforeach
                    </tr>
                    @else
                    <h1 class="title text-capitalize font-sz text--responsive text-light px-4">Нет данных</h1>
                    @endif


                </tbody>
            </table>
        </main>
    </header>

    @endsection