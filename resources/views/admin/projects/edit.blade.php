@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{route('admin.projects.update', $project)}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3 mt-5 ">
            <label for="" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                aria-describedby="titleHelp"
                placeholder=""
                value="{{old('title', $project->title)}}"
            />
            <small id="titleHelp" class="form-text text-muted">Modifica titolo</small>
        </div>
        <div class="mb-3 d-flex gap-4">
            <img src="{{$project->cover_img}}" alt="...">
            <div class="mb-3">

            
            
            <label for="cover_image" class="form-label">Choose file</label>
            <input
                type="file"
                class="form-control"
                name="cover_image"
                id="cover_image"
                placeholder=""
                aria-describedby="coverImageHelp"
                
            />
            <div id="fileHelpId" class="form-text">Carica l'immagine</div>
            @error('cover_image')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        </div>
        

        <div class="mb-3">
            <label for="content" class="form-label">Modifica testo</label>
            <textarea class="form-control" name="content" id="content" rows="5" value="{{old('content', $project->content)}}"></textarea>
        </div>
        
        <button
            type="submit"
            class="btn btn-primary"
        >
            Modifica
        </button>
        <a class="btn btn-primary " href="{{route('admin.projects.index')}}">Indietro</a>

        </form>
    </div>
@endsection