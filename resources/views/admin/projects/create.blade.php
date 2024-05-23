@extends('layouts.admin')

@section('content')
    <div class="container">
        <form action="{{route('admin.projects.store')}}" method="post">
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
            />
            <small id="titleHelp" class="form-text text-muted">Aggiungi un titolo</small>
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label">Inserisci testo</label>
            <textarea class="form-control" name="content" id="content" rows="5"></textarea>
        </div>
        
        <button
            type="submit"
            class="btn btn-primary"
        >
            Crea
        </button>
        

        </form>
    </div>
@endsection