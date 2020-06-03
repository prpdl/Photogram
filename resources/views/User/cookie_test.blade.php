@extends('User.layouts.base')

@section('head')
@parent

<title> CookieTest </title>

@show

@section('body')

@php
 function deletCookie(){
   return Cookie::get('Location');

}
@endphp

    {{deletCookie()}}



@stop
