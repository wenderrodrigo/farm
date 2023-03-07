@extends('layouts.main')

@section('title', 'Produtos - Farms')

@section('content')
<hr>

<form method="post">
    @csrf
    <b>Produto</b>
    <input type="text" name="produto" value="{{$produto}}" /><br><br>
    
    <b>Preco</b>
    <input type="text" name="preco" /><br><br>
    
    <b>Categoria</b>
    <input type="text" name="categoria" /><br><br>

    <input type="submit" value="Salvar">
</form>

<hr>
@endsection