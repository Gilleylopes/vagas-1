<label class="{{ $class ?? null }}">
	<span class="item_form">{{ $label ?? $input ?? "ERRO" }}</span>
	{!! Form::file($input, $value ?? null,  $attributes) !!}
        <span class="error_form" id="<?=$input?>_error_message"></span>
</label>