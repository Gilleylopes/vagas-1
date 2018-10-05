@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header"><a href="{{ route('vagas.index') }}"> Gerenciar Vagas > </a> Editar Vaga</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::model($vaga, ['route' => ['vagas.update', $vaga->id], 'method' => 'put', 'class' => 'form-padrao', 'id' => 'form_vaga']) !!}
                    @include('layouts.forms.input', ['label' => 'Título', 'input' => 'titulo', 'attributes' => ['placeholder' => 'Título' , 'id' => 'form_nome', 'required' ]]) 
                    @include('layouts.forms.input', ['label' => 'Descrição', 'input' => 'descricao', 'attributes' => ['placeholder' => 'Descrição', 'required']])
                    @include('layouts.forms.input', ['label' => 'Função', 'input' => 'funcao', 'attributes' => ['placeholder' => 'Função', 'required']])
                    @include('layouts.forms.input', ['label' => 'Qualificação', 'input' => 'qualificacao', 'attributes' => ['placeholder' => 'Qualificação', 'required']])
                    @include('layouts.forms.select', ['label' => "Status", 'select' => 'id_status_vagas', 'data' => $statusVagas_list, 'attributes' => ['placeholder' => 'Status', 'required']])
                    @include('layouts.forms.submit', ['input' => 'Atualizar'])
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
