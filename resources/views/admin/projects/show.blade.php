@extends('layouts.admin')

@section('content')
    

    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5 " style="width: 18rem;">
                    <img width="120" src="{{asset('storage/' . $project->cover_image)}}" class="card-img-top" alt="image">
                    <div class="card-body">
                      <h5 class="card-title">{{$project->title}}</h5>
                      <div class="metadata">
                        
                        <strong>Categoria:</strong>
                        {{$project->type?->name}}
                        <div class="tecnologies d-flex gap-2">
                          <strong>Tecnologie:</strong>
                          @forelse ($project->tecnologies as $tech)
                            <span class="badge bg-success"> {{$tech->name}}</span>
                          @empty
                            <span>Nessuna</span>
                          @endforelse 
                              
                          
                        
                        </div>
                        
                      </div>
                      <p class="card-text">{{$project->content}}</p>
                      <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Back</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection