@if(Auth::user()->image)
    <div class="container-avatar ml-4">
        {{-- <img src="{{ url('/user/avatar/' . Auth::user()->image) }}"> --}}
        <img class="avatar" src="{{ route('user.avatar', ['fileName' => Auth::user()->image]) }}" alt="">
    </div>
@endif