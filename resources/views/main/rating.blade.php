@extends('layouts.layout')
@section('title', 'Рейтинг')
@section('content')




<div class="header-pubg__bg-2">
    <div class="account-pubg__bg account__bg d-flex justify-content-end px-4">

        <div class="dropdown">

        <button class="header__line header__txt button--none dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{$mail}}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item header__txt text-dark" href="{{route('profile')}}">профиль</a></li>
            <li><a class="dropdown-item header__txt text-dark" href="{{route('user.logout')}}">выйти</a></li>
          </ul>
        </div>
    </div>
    @include('main.inc.nav_header')
</div>

<main class="main d-flex flex-column">
<div class="container">
    <h1 class="text text-capitalize font-sz text--responsive  px-4" >Рейтинг</h1>

    <table class="table indent--row table-block ">
        <tbody>
            <tr class="border-b border--none">
                <td></td>
                <td class="subtitle border--none">Последняя игра</td>
                <td class="subtitle  border--none">Страна</td>
                <td class="subtitle  border--none">Тrnts</td>
                <td class="subtitle  border--none">Kills</td>
                <td class="subtitle  border--none">Points</td>
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
          
            @endif


        </tbody>
    </table>
    </div>
</main>
</header>

@endsection