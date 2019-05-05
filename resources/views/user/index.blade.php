@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($users as $user)
            <div class="profile-user">
                @if($user->image)
                    <div class="container-avatar mx-2">
                        <img class="avatar" src="{{ route('user.avatar', ['fileName' => $user->image]) }}" alt="">
                    </div>
                @endif  
                <div class="user-info my-4">
                    <h2>{{ '@' . $user->nick}}</h2>
                    <h3>{{ $user->name . ' ' , $user->surname}}</h3>
                    <p>{{ 'Se unió: ' .\FormatTime::LongTimeFilter($user->created_at)}}</p>
                    <a href="{{ route('profile', ['id' => $user->id])}} " class="btn btn-info">Ver perfil</a>
                </div>    
            </div>  
            @endforeach
        </div>
        {{ $users->links() }}
    </div>
</div>
@endsection
