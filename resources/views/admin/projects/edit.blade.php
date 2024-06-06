@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{route('admin.projects.update', $project)}}" method="post" enctype="multipart/form-data">
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
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipo di progetto</label>
            <select
                class="form-select"
                name="type_id"
                id="type_id"
            >
                <option  selected disabled>Seleziona tipologia</option>
                
                @foreach ($types as $type)
                    <option value="{{$type->id}}" {{old('type_id', $project->type_id) == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex">
            @foreach ($tecnologies as $tecnology)
            <div class="form-check ms-2">
            <input class="form-check-input" type="checkbox" value="{{$tecnology->id}}" 
            
            {{ in_array($tecnology->id, old('tecnologies', $project->tecnologies->pluck('id')->toArray() ?? [])) ? 'checked' : '' }} 

{{--             
 --}}


            id="tecnology-{{$tecnology->id}}" name="tecnologies[]"/>
            <label class="form-check-label" for="tecnology-{{$tecnology->id}}"> {{$tecnology->name}} </label>
            </div>
            @endforeach
        </div>

        <div class="mb-3 d-flex gap-4">
            <img src="{{asset('storage/uploads' . $project->cover_image)}}" alt="...">
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
            <textarea class="form-control" name="content" id="content" rows="5" >{{old('content', $project->content)}}</textarea>
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