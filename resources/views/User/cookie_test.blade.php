@extends('User.layouts.base')

@section('head')
@parent

<title> CookieTest </title>

@show

@section('body')

@php

$cookie = Cookie::get('Ip');
var_dump($cookie);

@endphp



@stop
