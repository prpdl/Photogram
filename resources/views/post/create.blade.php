@extends('layouts.app')

@section('content')

    @include('partials.channels.list' , ['field'=>'name_list']);

@endsection
