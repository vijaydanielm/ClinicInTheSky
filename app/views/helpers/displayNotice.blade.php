@if(Session::get($noticeKey))
<div class="alert alert-info" role="alert">
    {{{ Session::get($noticeKey) }}}
</div>
@endif