@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @include('includes.message')
        <div class="col-md-8">
                @foreach($images as $image)                        
                <div class="card pub_image">
                    <div class="card-header d-flex ">
                        @if($image->user->image)
                            <div class="container-avatar mx-2">
                                <img class="avatar" src="{{ route('user.avatar', ['fileName' => $image->user->image]) }}" alt="">
                            </div>
                        @endif
                            <a class="enlaceImg" href="{{ route('image.detail', ['id' => $image->id]) }}">
                                {{ '@' . $image->user->nick}}
                            </a>
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
                            <?php $user_like = false ?>
                            @foreach ($image->likes as $like)
                            @if($like->user->id == Auth::user()->id)
                            <?php $user_like = true ?>
                            @endif
                            @endforeach
                            
                            @if($user_like)
                                <img src="{{ asset('img/heartR.png')}}" data-id="{{$image->id}}" class="btn-dislike">
                            @else
                                <img src="{{ asset('img/heart.png')}}" data-id="{{$image->id}}" class="btn-like">
                            @endif
                            <span class="numberLikes">
                                {{ count($image->likes) }}
                            </span>
                            <a href="#" class="btn btn-sm btn-secondary m-2 ml-3">Comentarios ({{ count($image->comments) }})</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $images->links()}}
            </div>
    </div>
</div>
@endsection
