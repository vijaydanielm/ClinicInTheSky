@if(Session::get('notice'))
<div class="alert alert-info" role="alert">
    {{{ Session::get('notice') }}}
</div>
@endif