
  <!-- Blade Templeting -->
  
@extends('Buildings.layout.base')

@section('head')
    
     @parent
    <link rel="stylesheet" href="another_one.css" />
    
@stop


@section('body')

@include('/Buildings/layout/buildingHeader')
    
    <h1>{{ $name}}</h1>
    <h3>{{date('10/10/10')}}</h3>
    <script> alert("Action Required"); </script>
    
    {{-- Control Statements --}}

    @if ($name == "operahouse")
        <P> Welcome to Opera House </P>
    @else 
        <p> You Are Not Welcome Here </p>
    @endif

    @for($i = 1; $i <= 10; $i++)
        <p>Record No: {{$i}} || Visited on {{date('1/2/3')}} </p>
    @endfor

    @unless ($name != "operahouse")
        <p> End Of Record </p>
    @endunless

    {{--Defining Variable in Blade --}}

    @php
        function message(){
            return "End of Blade For Now, We Shall Meet Again.";
        }

    @endphp

@include('/Buildings/layout/buildingFooter')

<b><u>{{message()}} </u> </b>

@stop
