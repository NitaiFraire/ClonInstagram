@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-user">
                    @if($user->image)
                        <div class="container-avatar mx-2">
                            <img class="avatar" src="{{ route('user.avatar', ['fileName' => $user->image]) }}" alt="">
                        </div>
                    @endif  
                    <div class="user-info my-4">
                        <h1>{{ '@' . $user->nick}}</h1>
                        <h2>{{ $user->name . ' ' , $user->surname}}</h2>
                        <p>{{ 'Se unió: ' .\FormatTime::LongTimeFilter($user->created_at)}}</p>
                    </div>
                    
            </div>  
        </div>
        
        @foreach($user->images as $image)                        
            @include('includes.image', ['image'=>$image])
        @endforeach
    </div>
</div>
@endsection
