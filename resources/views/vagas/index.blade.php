@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('home') }}"> Módulo Administração</a> > Gerenciar Vagas</div>
                {!! Form::open(['route' => 'vagas.create', 'method' => 'GET']) !!}
                @include('layouts.forms.submit', ['input' => 'Adicionar uma Nova Vaga' , 'attributes' =>  ['class' => 'inputAdicionar'] ])
                {!! Form::close() !!} 

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="default-table">
                        <tbody>
                            @foreach($vagas as $vaga)
                            <tr>
                                <td class="item_menu_rits">{{ $vaga->titulo }}</td>
                                <td>
                                    {!! Form::open(['route' => ['vagas.destroy', $vaga->id], 'method' => 'DELETE', 'class' => 'form-padrao']) !!}
                                    @include('layouts.forms.submit', ['input' => 'Remover'])
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['vagas.show', $vaga->id], 'method' => 'GET', 'class' => 'form-padrao']) !!}
                                    @include('layouts.forms.submit', ['input' => 'Visualizar'])
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['vagas.edit', $vaga->id], 'method' => 'GET', 'class' => 'form-padrao']) !!}
                                    @include('layouts.forms.submit', ['input' => 'Editar'])
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
