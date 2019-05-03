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
                                    @if (Auth::user() && Auth::user()->id == $image->user->id)
                                        <div class="actions">
                                            <a href="" class="btn btn-sm btn-danger">Borrar</a>
                                            <a href="" class="btn btn-sm btn-warning">Actualizar</a>
                                        </div>      
                                    @endif
                            <hr>
                                <form action="{{ route('comment.save')}}" method="post">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <p>
                                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" ></textarea>
                                    @if($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </p>
                                <input type="submit" value="Enviar" class="btn btn-lg btn-outline-dark">
                            </form>
                            <hr>
                            @foreach ($image->comments as $comment)
                                <div class="comment mt-4">
                                    <span class="nickname">{{ '@' . $comment->user->nick}}</span>
                                    <span class="nickname"> | {{ \FormatTime::LongTimeFilter($comment->created_at) }}</span>
                                    <p>{{ $comment->content}}</p>
                                    @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                        <a class="text-danger" href="{{ route('comment.delete', ['id' => $comment->id ])}}">Eliminar comentario</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
