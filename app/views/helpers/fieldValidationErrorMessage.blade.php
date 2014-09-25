@if($hasValidationErrors and array_key_exists($fieldName, $validationErrors) and $validationErrors[$fieldName])
<div class="alert alert-error alert-danger" role="alert">
    {{{ $validationErrors[$fieldName] }}}
</div>
<span class="glyphicon glyphicon-remove form-control-feedback"></span>
@endif