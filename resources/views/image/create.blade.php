@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subir nueva imagen</div>
                    <div class="card-body">
                        <form action="{{ route('image.save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="image_path" class="col-md-4 col-form-label text-md-right">Imagen</label>
                                <div class="col-md-6">
                                    <input type="file" name="image_path" id="image_path" class="form-control p-0 px-3" required>
                                    @if($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('image_path') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>
                                <div class="col-md-6">
                                    <textarea type="file" name="description" id="description" class="form-control p-0 px-3" required></textarea>
                                    @if($errors->has('description'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('description') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Subir" class="btn btn-lg btn-outline-dark">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection