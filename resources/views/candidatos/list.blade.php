<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Candidatos</div>

            <div class="card-body">

                <table class="default-table">
                    <tbody>
                        @foreach($candidatos_list as $candidato)
                             {!! Form::model($candidato, ['route' => ['candidatos.update', $candidato->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
                        <tr>
                            <td>{{ $candidato->nome }}</td>
                            <td> @include('layouts.forms.select', ['label' => "", 'select' => 'id_status_candidatos', 'data' => $statusCandidatos_list, 'attributes' => ['placeholder' => "Status"]]) </td>
                            {{form::hidden('id_candidato',$candidato->id)}}
                            <td>
                                <a href="{{ route('candidatos.update', $vaga->id) }}">Editar</a>
                            </td>
                        </tr>
                             {!! Form::close() !!}
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>