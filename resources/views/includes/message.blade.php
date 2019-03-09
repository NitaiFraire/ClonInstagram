@if(session('message'))
<div class="alert alert-success">
    <h3>{{ session('message') }}</h3> 
</div>
@endif