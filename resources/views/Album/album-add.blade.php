@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Album') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('album.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{old('title')}}" placeholder="Album Title" required
                                           autocomplete="off">
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
                                           value="{{old('gerne')}}" placeholder="Album Gerne" required
                                           autocomplete="off">

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
                                           value="{{old('year')}}" placeholder="Year Released" required
                                           autocomplete="off">

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
                                           value="{{old('name')}}" placeholder="Artist Name" required
                                           autocomplete="off">

                                    @error('artist')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="licensed"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Licensed') }}
                                </label>

                                <div class="form-check col-sm-auto">
                                    <input name="license" id="licensed" type="radio" value="public"
                                           class="form-check-input" checked>
                                    <label class="form-check-label" for="licensed">Public</label>
                                </div>
                                <div class="form-check col-sm-auto">
                                    <input name="license" id="licensed" type="radio" value="private"
                                           class="form-check-input">
                                    <label class="form-check-label" for="licensed">Private</label>

                                </div>
                            </div>


                            <div class="form-group row justify-content-around align-items-center">

                                <button type="submit" class="btn btn-primary col-sm-auto">Create</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
