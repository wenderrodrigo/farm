@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do evento</label>
            <input type="file" class="form-control-file" id="image" name="image" placeholder="Imagem anexada"/>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento"/>
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Nome da cidade"/>
        </div>
        <div class="form-group">
            <label for="private">O evento e privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Nao</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descricao:</label>
            <textarea class="form-control" id="description" name="description" placeholder="O que ira acontecer no evento?"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento" />
    </form>
</div>


@endsection