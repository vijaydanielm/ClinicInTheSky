<div class="row">
    <form method="POST" action="{{{ URL::to('settings/doctor/person') }}}" accept-charset="UTF-8" role="form">
        {{ Form::token() }}
        {{ Form::hidden('activeTab', 'personal') }}
        <fieldset>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrorsForPerson, 'first_name') }}}">
                <label class="control-label" for="person_first_name">
                    First Name
                </label>
                <input required="true" class="form-control" id="person_first_name"
                       placeholder="First name" type="text" name="person_first_name"
                       value="{{{ $person_first_name }}}" autofocus="true" tabindex="1">
                <span class="help-block">
                    First name should be between 2 and 128 characters long
                </span>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'first_name',
                'hasValidationErrors' => $hasValidationErrorsForPerson, 'validationErrors' =>
                $validationErrorsForPerson])
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrorsForPerson, 'last_name') }}}">
                <label class="control-label" for="person_last_name">
                    Last name
                </label>
                <input required="true" class="form-control" id="person_last_name"
                       placeholder="Enter your last name" type="text" name="person_last_name"
                       value="{{{ $person_last_name }}}" tabindex="2">
                            <span class="help-block">
                                Last name lol
                            </span>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'last_name',
                'hasValidationErrors' => $hasValidationErrorsForPerson, 'validationErrors' =>
                $validationErrorsForPerson])
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrorsForPerson, 'gender') }}}">
                <label class="control-label" for="person_gender">
                    Gender
                </label>
                {{Form::select('person_gender', ClinicInTheSky\Person::$genderValues, $person_gender,
                [
                'class' => 'form-control',
                'id' => 'person_gender',
                'tabindex' => '3'
                ]) }}
                <span class="help-block">
                    Your password should be between 6 and 64 characters long
                </span>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'gender',
                'hasValidationErrors' => $hasValidationErrorsForPerson, 'validationErrors' =>
                $validationErrorsForPerson])
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrorsForPerson, 'date_of_birth') }}}">
                <label class="control-label" for="person_date_of_birth">
                    Date of Birth
                </label>
                <input required="true" class="form-control" id="person_date_of_birth"
                       placeholder="Select your date of birth" type="date" name="person_date_of_birth"
                       tabindex="4" value="{{{ $person_date_of_birth }}}">
                <br>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'date_of_birth',
                'hasValidationErrors' => $hasValidationErrorsForPerson, 'validationErrors' =>
                $validationErrorsForPerson])
            </div>

            @if($hasValidationErrorsForPerson)
            <div class="alert alert-error alert-danger" role="alert">
                Please fix the above errors in order to update your personal data.
            </div>
            @endif

            @include('helpers.displayNotice', ['noticeKey' => 'person_notice'])

            <div class="form-group">
                <button tabindex="5" type="submit" class="btn btn-default btn-block btn-lg">
                    <span class="glyphicon glyphicon-floppy-open"></span>
                    Update my personal data
                </button>
            </div>
        </fieldset>
    </form>
</div>