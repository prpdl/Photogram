
@extends('User.layouts.base')

@section('head')
    @parent

<title> UserInfo </title>
    
@show

@section('body')

  
<form action="{{ url('upload-file')}}" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="file" name="book">
    <input type="submit">  
    
</form>



@php
   
@endphp


@stop

