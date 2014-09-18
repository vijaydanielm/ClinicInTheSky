@extends('layouts.default')

@section('body')
<div class="row">
    <div class="col-lg-6">
        <div class="well bs-component">
            {{ Former::legend('Personal Details') }}
            {{ Former::horizontal_open()->rules(ClinicInTheSky\Person::$rules)->method('GET') }}
            <div class="form-group">
                {{ Former::text('first_name') }}
                {{ Former::text('last_name') }}
                {{ Former::select('gender')->options(['male'=>'Male', 'female'=>'Female', 'other'=>'Other']) }}
            </div>
            <div class="form-group">

            </div>

            {{ Former::actions()->large_primary_submit('Save')->large_inverse_reset('Cancel') }}
            {{ Former::close() }}
        </div>
    </div>
</div>
@stop