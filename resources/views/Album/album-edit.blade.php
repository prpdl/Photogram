@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Albums') }}
                        <form class="float-right" action="{{ route('album.destroy', $album->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('album.update', $album) }}">
                            {{ method_field('PUT') }}
                            @csrf

                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ $album->title }}" required autocomplete="off">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gerne"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Gerne') }}</label>

                                <div class="col-md-6">
                                    <input id="gerne" type="text"
                                           class="form-control @error('gerne') is-invalid @enderror" name="gerne"
                                           value="{{ $album->gerne }}" required autocomplete="off">

                                    @error('gerne')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                                <div class="col-md-6">
                                    <input id="year" type="text"
                                           class="form-control @error('year') is-invalid @enderror" name="year"
                                           value="{{ $album->year }}" required autocomplete="off">

                                    @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="artist"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Artist') }}</label>

                                <div class="col-md-6">
                                    <input id="artist" type="text"
                                           class="form-control @error('artist') is-invalid @enderror" name="artist"
                                           value="{{ $album->artist->name ?? '' }}" required autocomplete="off">

                                    @error('artist')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row justify-content-around align-items-center">

                                <button type="submit" class="btn btn-primary col-sm-auto">Update</button>

                                <a href="{{route('album.index')}}"><button type="button" class="btn btn-primary col-sm-auto">Cancle</button></a>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
