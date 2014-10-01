<div class="row">

    {{ CustomForm::postFormTo('settings/doctor/person') }}
    {{ CustomForm::setActiveTab(Constants\Settings\Tabs::PERSONAL) }}

    <fieldset>

        {{ CustomForm::textValue(Constants\Settings\PersonalInput::FIRST_NAME,
        Constants\Settings\Models::PERSON, $person_first_name)->autofocus()->required()
        ->label('First name*')->tabIndex(1)->placeHolder('Enter your first name')
        ->helpMessage('First name should be between 2 and 128 characters long, and consist of alphabets and spaces
        only')->validationErrors($validationErrors) }}

        {{ CustomForm::textValue(Constants\Settings\PersonalInput::LAST_NAME,
        Constants\Settings\Models::PERSON, $person_last_name)->label('Last name')->tabIndex(2)
        ->placeHolder('Enter your last name')
        ->helpMessage('Last name should be between 1 and 128 characters long, and consist of alphabets and spaces only')
        ->validationErrors($validationErrors) }}

        {{ CustomForm::selectDefault(Constants\Settings\PersonalInput::GENDER,
        Constants\Settings\Models::PERSON, ClinicInTheSky\Person::$genderValues,
        $person_gender)->required()->label('Gender*')->tabIndex(3)->validationErrors($validationErrors) }}

        <div
            class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'date_of_birth') }}}">
            <label class="control-label" for="person_date_of_birth">
                Date of Birth (yyyy/mm/dd)*
            </label>

            <div class="input-group date" id="person_date_of_birth_picker">
                    <span class="input-group-addon datepickerbutton">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                <input required="true" type="text" class="form-control" name="person_date_of_birth"
                       id="person_date_of_birth" placeholder="Select your date of birth yyyy/mm/dd"
                       tabindex="4" value="{{{$person_date_of_birth}}}"
                       data-date-format="YYYY/MM/DD" data-date-pickTime="false">
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#person_date_of_birth_picker').datetimepicker();
                });
            </script>
            <br>
            @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'date_of_birth'])
        </div>

        @if($hasValidationErrors)
        <div class="alert alert-error alert-danger" role="alert">
            Please fix the above errors in order to update your personal data.
        </div>
        @endif

        @include('helpers.displayNotice', ['noticeKey' => 'person_notice'])

        @include('helpers.saveChanges', ['saveChangesText' => 'Update my personal data', 'saveChangesTabIndex'
        =>
        '5'])

    </fieldset>
    {{ CustomForm::close() }}

    @include('helpers.discardChanges', ['activeTabName' => Constants\Settings\Tabs::PERSONAL , 'discardChangesUrl'
    =>
    'settings', 'discardChangesTabIndex' => '6'])
</div>