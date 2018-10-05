@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('vagas.index') }}"> Gerenciar Vagas</a> > Cadastrar Nova Vaga</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['route' => 'vagas.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
                    @include('layouts.forms.input', ['label' => 'Título', 'input' => 'titulo', 'attributes' => ['placeholder' => 'Título', 'required']]) 
                    @include('layouts.forms.input', ['label' => 'Descrição', 'input' => 'descricao', 'attributes' => ['placeholder' => 'Descrição', 'required']])
                    @include('layouts.forms.input', ['label' => 'Função', 'input' => 'funcao', 'attributes' => ['placeholder' => 'Função', 'required']])
                    @include('layouts.forms.input', ['label' => 'Qualificação', 'input' => 'qualificacao', 'attributes' => ['placeholder' => 'Qualificação', 'required']])
                    @include('layouts.forms.input', ['label' => 'Cidade', 'input' => 'cidade', 'attributes' => ['placeholder' => 'Cidade', 'required']])
                    @include('layouts.forms.input', ['label' => 'UF', 'input' => 'uf', 'attributes' => ['placeholder' => 'UF', 'data-mask' => 'AA', 'required']])
                    {{form::hidden('id_status_vagas',1)}}
                    @include('layouts.forms.submit', ['input' => 'Cadastrar'])
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
