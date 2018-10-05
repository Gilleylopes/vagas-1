@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('vagas.index') }}"> Gerenciar Vagas</a> > Vaga Selecionada</div>
                    <header>
                            <h1 class="descricao_menu_rits">Titulo: {{ $vaga->titulo }}</h1>
                            <h2 class="descricao_menu_rits">Descrição: {{ $vaga->descricao }}</h2>
                            <h2 class="descricao_menu_rits">Função: {{ $vaga->funcao }}</h2>
                            <h2 class="descricao_menu_rits">Qualificação: {{ $vaga->qualificacao }}</h2>
                            <h2 class="descricao_menu_rits">Status: {{ $vaga->statusVaga->descricao }}</h2>
                    </header>
                </div>
            </div>
        </div>
    
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Candidatos da Vaga</div>

            <div class="card-body">

                <table class="default-table">
                    <tbody>
                        @foreach($candidatos_list as $candidato)
                             {!! Form::model($candidato, ['route' => ['vagas.updateCandidato', $candidato->id], 'method' => 'put', 'class' => 'form-padrao']) !!}
                        <tr>
                            <td class='subitem_rits'>{{ $candidato->nome }}</td>
                            <td> @include('layouts.forms.select', ['label' => "", 'select' => 'id_status_candidatos', 'data' => $statusCandidatos_list, 'attributes' => ['placeholder' => "Status" , 'onchange' => 'this.form.submit()']]) </td>
                            {{form::hidden('id_candidato',$candidato->id)}}
                                {!! Form::close() !!}
                        </tr>
                             {!! Form::close() !!}
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
    
    </div>
    
</div>
@endsection
