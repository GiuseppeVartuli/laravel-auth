@extends('layouts.admin')

@section('content')
    <div class="container">


        @include('partials.errors')

        @include('partials.message')


        <form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data" >
        @csrf

        <div class="mb-3 mt-5 ">
            <label for="" class="form-label">Titolo</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title"
                aria-describedby="titleHelp"
                placeholder=""
                value="{{old('title')}}"
            />
            <small id="titleHelp" class="form-text text-muted">Aggiungi un titolo</small>
            @error('title')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Tipo di progetto</label>
            <select
                class="form-select"
                name="type_id"
                id="type_id"
            >
                <option selected disabled>Seleziona una tipologia</option>
                
                @foreach ($types as $type)
                    <option value="{{$type->id}} {{old('type_id') == $type->id ? 'selected' : ''}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        

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
        
        
        <div class="mb-3">
            <label for="content" class="form-label">Inserisci testo</label>
            <textarea class="form-control" name="content" id="content" rows="5" value="{{old('content')}}"></textarea>
            @error('content')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <a class="btn btn-primary " href="{{route('admin.projects.index')}}"> Indietro</a>
        <button
            type="submit"
            class="btn btn-primary"
        >
            Crea
        </button>
        

        </form>
    </div>
@endsection