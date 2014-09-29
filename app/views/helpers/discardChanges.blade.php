<form method="POST" action="{{{ URL::to($discardChangesUrl) }}}" accept-charset="UTF-8" role="form">
    {{ Form::hidden('activeTab', $activeTabName) }}
    <button tabindex="{{{$discardChangesTabIndex}}}" type="submit" class="btn btn-block btn-danger btn-lg">
        <span class="glyphicon glyphicon-remove"></span>
        Discard my changes
    </button>
</form>