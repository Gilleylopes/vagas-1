@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Candidatar-se a vaga</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['route' => 'candidatos.store', 'method' => 'post','files'=>'true', 'class' => 'form-padrao', 'id' => 'form_candidato']) !!}
                    @include('layouts.forms.input', ['label' => 'Nome', 'input' => 'nome', 'attributes' => ['placeholder' => 'Digite seu nome', 'id' => 'form_nome']]) 
                    @include('layouts.forms.input', ['label' => 'Email', 'input' => 'email', 'attributes' => ['placeholder' => 'Digite seu email', 'id' => 'form_email']])
                    @include('layouts.forms.input', ['label' => 'Telefone (com DDD)', 'input' => 'telefone', 'attributes' => ['placeholder' => '(XX) XXXX-XXXX', 'id' => 'form_telefone', 'data-mask' => '(00) 0000-0000']])
                    @include('layouts.forms.input', ['label' => 'URL do seu Linkedin', 'input' => 'url_linkedin', 'attributes' => ['placeholder' => 'www.linkedin.com/xxxxx', 'id' => 'form_url_linkedin']])
                    @include('layouts.forms.input', ['label' => 'URL do seu Github', 'input' => 'url_github', 'attributes' => ['placeholder' => 'www.github.com/xxxxx', 'id' => 'form_url_github']])
                    @include('layouts.forms.input', ['label' => 'Pretensão salarial', 'input' => 'salario', 'attributes' => ['placeholder' => 'R$', 'id' => 'form_salario','data-mask' => 'R$ 0.000,00']])
                    @include('layouts.forms.select', ['label' => 'Qual seu nível de Inglês', 'select' => 'id_nivel_lingua_estrangeira', 'data' => $niveis, 'attributes' => ['placeholder' => 'Selecione um nível', 'id' => 'form_id_nivel_lingua_enstrangeira']])
                    {{form::hidden('id_vaga',$vaga->id)}}
                    {{form::hidden('id_status_candidatos',1)}}
                    @include('layouts.forms.file', ['label' => 'File', 'input' => 'file_name', 'attributes' => [ 'id' => 'form_file_name']])
                    @include('layouts.forms.text', ['label' => 'Carta Apresentação', 'input' => 'carta_apresentacao', 'attributes' => ['placeholder' => 'Faça um breve resumo sobre você', 'resize' => 'resize: vertical;']])
                    @include('layouts.forms.submit', ['input' => 'Cadastrar', 'attributes' => ['id' => 'form_cadastrar', 'name' => 'form_cadastrar'] ])
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

$(function() {
        
        $("#nome_error_message").hide();
        $("#email_error_message").hide();
        $("#telefone_error_message").hide();
        $("#url_linkedin_error_message").hide();
        $("#url_github_error_message").hide();
        $("#salario_error_message").hide();
        <!--$("#file_name_error_message").hide();-->
        $("#id_nivel_lingua_estrangeira_error_message").hide();
        
        var error_nome = false;
        var error_email = false;
        var error_telefone = false;
        var error_url_linkedin = false;
        var error_url_github = false;
        var error_salario = false;
        <!--var error_file_name = false;-->
        var error_id_nivel_lingua_inglesa = false;
        
        $("#form_nome").focusout(function() {
            check_nome();
        });
        
        $("#form_email").focusout(function() {
            check_email();
        });
        
        $("#form_telefone").focusout(function() {
            check_telefone();
        });
        
        $("#form_url_linkedin").focusout(function() {
            check_linkedin();
        });
        
        $("#form_url_github").focusout(function() {
            check_github();
        });
        
        $("#form_salario").focusout(function() {
            check_salario();
        });
        
        $("#form_file_name").focusout(function() {
            check_file();
        });
        
        $("#form_id_nivel_lingua_inglesa").focusout(function() {
            check_nivel();
        });


	function check_nome() {
        
            var pattern = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;
            if(!pattern.test($("#form_nome").val())) {
                    $("#nome_error_message").html("Por favor informe seu nome.");
                    $("#nome_error_message").show();
                    error_nome = true;
            } else {
                    $("#nome_error_message").hide();
            }
	
	}
        
        function check_email() {
        
             var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	
            if(!pattern.test($("#form_email").val())) {
                    $("#email_error_message").html("Por favor informe um email válido.");
                    $("#email_error_message").show();
                    error_email = true;
            } else {
                    $("#email_error_message").hide();
            }
	
	}
        
        function check_telefone() {
	
            var telefone_length = $("#form_telefone").val().length;

            if(telefone_length < 5 || telefone_length > 20) {
                    $("#telefone_error_message").html("Should be between 5-20 characters");
                    $("#telefone_error_message").show();
                    error_telefone = true;
            } else {
                    $("#telefone_error_message").hide();
            }
	
	}
        
        function check_linkedin() {
	
            var contains = ($("#form_url_linkedin").val().indexOf('linkedin.com') > -1);
	
            if(!contains) {
                    $("#url_linkedin_error_message").html("Por favor informe uma URL do Linkedin válida.");
                    $("#url_linkedin_error_message").show();
                    error_url_linkedin = true;
            } else {
                    $("#url_linkedin_error_message").hide();
            }
	
	}
        
        function check_github() {
	
             var contains = ($("#form_url_github").val().indexOf('github.com') > -1);
	
            if(!contains) {
                    $("#url_github_error_message").html("Por favor informe uma URL do GITHUB válida.");
                    $("#url_github_error_message").show();
                    error_url_github = true;
            } else {
                    $("#url_github_error_message").hide();
            }
	
	}
        
        function check_salario() {
	
            var pattern = /^\d{0,4}(\,\d{0,2})?$/;
         
            if($("#form_salario").is(':empty')) {
                    $("#salario_error_message").html("Informe uma pretensão salarial.");
                    $("#salario_error_message").show();
                    error_salario = true;
            } else {
                    $("#salario_error_message").hide();
            }
	
	}
        
          function check_file() {
	

            if($("#form_file_name").val() == '') {
                    $("#file_name_error_message").html("Informe um arquivo pdf.");
                    $("#file_name_error_message").show();
                    error_file_name = true;
            } else {
                    $("#file_name_error_message").hide();
            }
	
	}
        
       function check_nivel() {
	

            if($("#form_id_nivel_lingua_enstrangeira").val() == '') {
                    $("#id_nivel_lingua_estrangeira_error_message").html("Should be between 5-20 characters");
                    $("#id_nivel_lingua_estrangeira_error_message").show();
                    error_id_nivel_lingua_inglesa = true;
            } else {
                    $("#id_nivel_lingua_estrangeira_error_message").hide();
            }
	
	}
        
        $("#form_cadastrar").click(function() {
		error_nome = false;
                error_email = false;
                error_telefone = false;
                error_url_linkedin = false;
                error_url_github = false;
                error_salario = false;
                <!--error_file_name = false;-->
                error_id_nivel_lingua_inglesa = false;
											
		check_nome();
                check_email();
                check_telefone();
                check_linkedin();
                check_github();
                check_salario();
                check_file();
                check_nivel();
                
		
		if(error_nome == false && error_email == false && 
                error_telefone == false && error_url_linkedin == false && 
                error_url_github == false && error_salario == false  
                <!-- && error_file_name == false--> 
                && error_id_nivel_lingua_inglesa == false ) {
			return true;
		} else {
			return false;	
		}

	});

});
@endsection


