@extends('layouts.app')

@section('content')

    <div class="container">

    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Album Name
                <a href="{{ route('album.create') }}"> <button class="btn btn-dark btn-sm">Add+</button></a>
            </th>
            <th scope="col">Artist</th>
            <th scope="col">Year</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($albums as $album)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$album->title}}</td>
                <td>{{$album->artist->name ?? ''}}</td>
                <td>{{$album->year ?? ''}}</td>
                <td>
                   <a href="{{route('album.edit', $album->id)}}"><button type="button" class="btn btn-dark btn-sm">Edit</button></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    </div>

@endsection
