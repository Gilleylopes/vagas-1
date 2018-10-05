<label class="{{ $class ?? null }}">
	<span class="item_form">{{ $label ?? $select ?? "ERRO" }}</span>
	{!! Form::select($select, $data ?? [], $value ?? null, $attributes) !!}
        <span class="error_form" id="<?=$select?>_error_message">
</label>