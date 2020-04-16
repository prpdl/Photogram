@extends('User.layouts.base')

@section('head')
@parent

<title> UserInfo </title>

@show

@section('body')

<form action="{{URL('/User/Infoo')}}?name=alpha&email=alpha_111@gmail.com" method="get">
    {{ csrf_field() }}


    <table>
        <tr>
            <td><input type="input" name="name" value="Pradip" /></td>
            <td> <input type="input" name="email" value="prp_slayer@hotmail.com" /></td>
            <td> <input type="input" name="phone" value="0426267158" /></td>

            <td> <input type="Submit" name="submit" id="submit"></td>
        </tr>
    </table>
</form>


@stop