@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @include('includes.message')
        <div class="col-md-8">
                @foreach($images as $image)                        
                    @include('includes.image', ['image'=>$image])
                @endforeach
                {{ $images->links()}}
            </div>
    </div>
</div>
@endsection
