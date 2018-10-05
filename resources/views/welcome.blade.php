@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="titulo_rits"> Vagas Em Aberto</div>

                <div class="card-body">
                    <table >
                        <tbody>
                            @foreach($vagas as $vaga)
                            <tr>
                                <td width="80%" class="item_rits">{{ $vaga->titulo }}</td>
                                <td width="20%" rowspan="2">
                                    {!! Form::open(['route' => ['candidatos.edit', $vaga->id], 'method' => 'GET', 'class' => 'form-padrao']) !!}
                                    @include('layouts.forms.submit', ['input' => 'Candidata-se', 'attributes' => ['with' => '200px'] ])
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="subitem_rits"> {{ $vaga->cidade }} - {{ $vaga->uf }}  </td>
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
