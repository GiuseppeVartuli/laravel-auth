@if (session('message'))
    
    <div class="alert alert-success">
        <strong>Fatto</strong>
        {{session('message')}}
    </div>

    
@endif