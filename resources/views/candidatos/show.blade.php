@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('vagas.index') }}"> Gerenciar Vagas</a> > Vaga Selecionada</div>
                    <header>
                            <h1>Titulo: {{ $vaga->titulo }}</h1>
                            <h2>Descrição: {{ $vaga->descricao }}</h2>
                            <h2>Função: {{ $vaga->funcao }}</h2>
                            <h2>Qualificação: {{ $vaga->qualificacao }}</h2>
                            <h2>Status: {{ $vaga->statusVaga->descricao }}</h2>
                    </header>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
