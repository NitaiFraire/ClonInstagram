@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">                       
            @include('includes.message')
                <div class="card pub_image">
                    <div class="card-header d-flex ">
                        @if($image->user->image)
                            <div class="container-avatar mx-2">
                                <img class="avatar" src="{{ route('user.avatar', ['fileName' => $image->user->image]) }}" alt="">
                            </div>
                        @endif
                        {{ '@' . $image->user->nick}}
                    </div>
                    <div class="card-body p-0">
                        <div class="image_container">
                            <img class="img-fluid mx-auto d-block" src="{{ route('image.file', ['fileName' => $image->image_path])}}" alt="">
                        </div>
                        <div class="description py-1 px-4">
                                <span class="nickname">{{ '@' . $image->user->name}}</span>
                                <span class="nickname"> | {{ \FormatTime::LongTimeFilter($image->created_at) }}</span>
                                <p>{{ $image->description}}</p>
                            </div>
                        <div class="likes mx-4 my-1">
                            <img src="{{ asset('img/heart.png')}}" alt="">
                            <a href="#" class="btn btn-sm btn-secondary m-2 ml-3">Comentarios ({{ count($image->comments) }})</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
