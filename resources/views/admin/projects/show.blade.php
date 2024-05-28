@extends('layouts.admin')

@section('content')
    

    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5 " style="width: 18rem;">
                    <img src="{{$project->cover_image}}" class="card-img-top" alt="image">
                    <div class="card-body">
                      <h5 class="card-title">{{$project->title}}</h5>
                      <p class="card-text">{{$project->content}}</p>
                      <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Back</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection