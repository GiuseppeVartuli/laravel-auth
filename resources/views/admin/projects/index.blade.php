@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.message')
        
        <div
            class="table-responsive"
        >
        <a class="btn btn-primary mt-5 " href="{{route('admin.projects.create')}}">Aggiungi</a>
            <table
                class="table table-primary mt-5   "
            >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Cover Image</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project )
                    <tr class="">
                        <td scope="row">{{$project->id}}</td>
                        <td scope="row">{{$project->title}}</td>
                        <td scope="row">
                            <img width="120" src="{{asset('storage/' . $project->cover_image)}}" alt="">                            
                        </td>
                        <td scope="row">{{$project->slug}}</td>
                        <td scope="row">
                            <a class="btn btn-primary " href="{{route('admin.projects.show', $project)}}" >View</a>
                            <a class="btn btn-secondary " href="{{route('admin.projects.edit', $project)}}">Edit</a>
                            
                            @include('admin.projects.partials.delete')



                            
                        </td>
                        
                    </tr>
                    @empty
                    <tr class="">
                        <td scope="row" colspan="5">No projects</td>
                        
                    </tr>
                    @endforelse
                    
                    
                </tbody>
            </table>
            
        </div>
        
    </div>
@endsection