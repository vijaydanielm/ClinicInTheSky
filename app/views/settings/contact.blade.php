<div class="row">
    <form method="POST" action="{{{ URL::to('settings/address/') }}}" accept-charset="UTF-8" role="form">
        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
        
    </form>
</div>