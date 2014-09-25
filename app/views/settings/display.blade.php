@extends('layouts.default')

@section('pageTitle', 'Clinic In The Sky - Edit your settings')

@section('body')
<div class="row">

    <div class="">
        <div class="col-md-3">
            <!-- Use javascript to select an active tab?? -->
            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-stacked" role="tablist">
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

        <div class="col-md-9">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="clinic">
                    @include('settings.clinic')
                </div>
                <div class="tab-pane" id="personal">
                    @include('settings.personal')
                </div>
                <div class="tab-pane" id="contact">
                    @include('settings.contact')
                </div>
            </div>
        </div>
    </div>
</div>
@stop