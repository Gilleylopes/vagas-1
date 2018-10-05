@php
	$attributes['placeholder'] = $attributes['placeholder'] ?? $label;
@endphp
<label class="{{ $class ?? null }}">
	<span>{{ $label ?? $input ?? "ERRO" }}</span>
	{!! Form::textArea($input, $value ?? null, $attributes) !!}
        <span class="error_form" id="<?=$input?>_error_message"></span>
</label>