@extends('layouts.layout')
@section('title', 'Рейтинг')
@section('content')




<div class="header-pubg__bg-2">
 
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