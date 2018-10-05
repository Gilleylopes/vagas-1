@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Módulo Administração</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li>
                            <a href="{{ route('vagas.index') }}">
                                <i class="fa fa-address-book"></i>
                                <h3>Gerenciar Vagas</h3>
                            </a>
                        </li>                        
                    <ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
