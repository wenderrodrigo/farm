@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<link rel="stylesheet" href="/assets/js/jquery-ui-1.13.2/jquery-ui.min.css">
<script src="/assets/js/jquery-3.6.3.min.js"></script>
<script src="/assets/js/jquery-ui-1.13.2/jquery-ui.min.js"></script>
<script src="/assets/js/products.js"></script>
<div class="bg-dark topo-title">
  <h1 class="text-center text-white">Cadastro de produto</h1>
</div>
<div id="event-create-container" class="col-md-10">
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="codigo_barras" class="form-label">Código de barras</label>
                <input type="text" class="form-control" id="codigo_barras" name="codigo_barras">
            </div>
            <div class="col-md-3 mb-3">
                <label for="fabricante" class="form-label">Fabricante</label>
                <input type="text" class="form-control" id="fabricante" name="fabricante">
            </div>
            <div class="col-md-3 mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria">
            </div>
            <div class="col-md-3 mb-3">
                <label for="principio_ativo" class="form-label">Princípio ativo</label>
                <input type="text" class="form-control" id="principio_ativo" name="principio_ativo">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="dosagem" class="form-label">Dosagem</label>
                <input type="text" class="form-control" id="dosagem" name="dosagem">
            </div>
            <div class="col-md-3 mb-3">
                <label for="forma_farmaceutica" class="form-label">Forma farmacêutica</label>
                <input type="text" class="form-control" id="forma_farmaceutica" name="forma_farmaceutica">
            </div>
            <div class="col-md-3 mb-3">
                <label for="prescricao_medica" class="form-label">Prescrição médica</label>
                <select class="form-select" id="prescricao_medica" name="prescricao_medica">
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="restricoes">Restrições de uso:</label>
                <input type="text" class="form-control" id="restricoes" placeholder="Informações sobre restrições de uso">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="imagem">Imagem do produto:</label>
                <input type="text" class="form-control" id="imagem" placeholder="URL da imagem do produto">
            </div>
            <div class="col-md-3 mb-3">
                <label for="lotes">Lotes:</label>
                <input type="text" class="form-control" id="lotes" placeholder="Registro do número do lote">
            </div>
            <div class="col-md-3 mb-3">
                <label for="registros">Registros:</label>
                <input type="text" class="form-control" id="registros" placeholder="Informações sobre registros sanitários">
            </div>
            <div class="col-md-3 mb-3">
                <label for="peso">Peso ou volume:</label>
                <input type="text" class="form-control" id="peso" placeholder="Peso ou volume do produto">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="data-fab">Data de fabricação:</label>
                <input type="date" class="form-control" id="data-fab">
            </div>
            <div class="col-md-3 mb-3">
                <label for="nutricionais">Informações nutricionais:</label>
                <input type="text" class="form-control" id="nutricionais" placeholder="Informações sobre valores nutricionais">
            </div>
            <div class="col-md-3 mb-3">
                <label for="certificacoes">Certificações:</label>
                <input type="text" class="form-control" id="certificacoes" placeholder="Informações sobre certificações de qualidade">
            </div>
            <div class="col-md-3 mb-3">
                <label for="armazenamento">Informações de armazenamento:</label>
                <input type="text" class="form-control" id="armazenamento" placeholder="Informações sobre as condições de armazenamento">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="acondicionamento" class="form-label">Forma de Acondicionamento</label>
                <input type="text" class="form-control" id="acondicionamento" name="acondicionamento">
            </div>
            <div class="col-md-3 mb-3">
                <label for="pais" class="form-label">País de Origem</label>
                <input type="text" class="form-control" id="pais" name="pais">
                <input type="hidden" id="number_pais" name="number_pais">
            </div>
            <div class="col-md-3 mb-3">
                <label for="vendaOnline" class="form-label">Informações para Venda Online</label>
                <input type="text" class="form-control" id="vendaOnline" name="vendaOnline">
            </div>
            <div class="col-md-3 mb-3">
                <label for="idFiscal" class="form-label">Identificação Fiscal</label>
                <input type="text" class="form-control" id="idFiscal" name="idFiscal">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3 mb-3">
                <label for="margemLucro" class="form-label">Margem de Lucro</label>
                <input type="text" class="form-control" id="margemLucro" name="margemLucro">
            </div>
            <div class="col-md-3 mb-3">
                <label for="estoqueMinimo" class="form-label">Estoque Mínimo</label>
                <input type="text" class="form-control" id="estoqueMinimo" name="estoqueMinimo">
            </div>
            <div class="col-md-3 mb-3">
                <label for="estoqueMaximo" class="form-label">Estoque Máximo</label>
                <input type="text" class="form-control" id="estoqueMaximo" name="estoqueMaximo">
            </div>
            <div class="col-md-3 mb-3">
                <label for="promocoes" class="form-label">Promoções</label>
                <input type="text" class="form-control" id="promocoes" name="promocoes">
            </div>
        </div>
        <div class="d-flex">
            <button type="button" class="btn btn-primary me-2">Registrar</button>
            <button type="button" class="btn btn-danger me-2">Deletar</button>
            <button type="button" class="btn btn-secondary ms-auto">Limpar</button>
        </div>

    </form>
</div>
@endsection