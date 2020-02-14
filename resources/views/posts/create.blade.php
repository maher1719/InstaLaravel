@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label text-md-right">Image caption</label>


                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                               name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">fichier image</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row">
                        <button class="btn btn-primary">ajouter</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection