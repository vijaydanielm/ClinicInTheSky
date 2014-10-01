@extends('layouts.default')

@section('pageTitle', 'Clinic In The Sky - Edit your settings')

@section('body')
<div class="row panel">
    <div class="panel-body">
        <div class="col-md-3 well">
            <!-- Nav tabs -->
            <ul id="settingsTab" class="nav nav-pills nav-stacked" role="tablist">
                <li class="{{{ $tabStatus['clinic'] }}}">
                    <a href="#clinic" role="tab" data-toggle="tab">Clinic</a>
                </li>
                <li class="{{{ $tabStatus['personal'] }}}">
                    <a href="#personal" role="tab" data-toggle="tab">Personal</a>
                </li>
                <li class="{{{ $tabStatus['contact'] }}}">
                    <a href="#contact" role="tab" data-toggle="tab">Contact</a>
                </li>
            </ul>
        </div>

        <div class="col-md-9 well">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane {{{ $tabStatus['clinic'] }}}" id="clinic">
                    @include('settings.clinic', ['hasValidationErrors' => $hasValidationErrorsForClinic,
                    'validationErrors' => $validationErrorsForClinic])
                </div>
                <div class="tab-pane {{{ $tabStatus['personal'] }}}" id="personal">
                    @include('settings.personal', ['hasValidationErrors' => $hasValidationErrorsForPerson,
                    'validationErrors' => $validationErrorsForPerson])
                </div>
                <div class="tab-pane {{{ $tabStatus['contact'] }}}" id="contact">
                    @include('settings.contact', ['hasValidationErrors' => $hasValidationErrorsForContact,
                    'validationErrors' => $validationErrorsForContact])
                </div>
            </div>
        </div>
    </div>
</div>
@stop