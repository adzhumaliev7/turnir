@extends('layouts.layout')
@section('title', 'Профиль')
@section('content')

@foreach($tems as $t)
    @foreach($t->teammates as $s)

    @endforeach 
@endforeach   
@endsection