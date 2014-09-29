<div class="row">
    <form method="POST" action="{{{ URL::to('settings/doctor/person') }}}" accept-charset="UTF-8" role="form">
        {{ Form::token() }}
        {{ Form::hidden('activeTab', 'personal') }}
        <fieldset>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors,
                            Constants\Settings\PersonalInput::FIRST_NAME) }}}">
                <label class="control-label" for="person_first_name">
                    First Name*
                </label>
                <input required="true" class="form-control" id="person_first_name"
                       placeholder="First name" type="text" name="person_first_name"
                       value="{{{$person_first_name}}}" autofocus="true" tabindex="1">
                <span class="help-block">
                    First name should be 2 and 128 characters long, and consist of alphabets and spaces only
                </span>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'first_name'])
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'last_name') }}}">
                <label class="control-label" for="person_last_name">
                    Last name
                </label>
                <input required="true" class="form-control" id="person_last_name"
                       placeholder="Enter your last name" type="text" name="person_last_name"
                       value="{{{$person_last_name}}}" tabindex="2">
                <span class="help-block">
                    Last name should be 1 and 128 characters long, and consist of alphabets and spaces only
                </span>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'last_name'])
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'gender') }}}">
                <label class="control-label" for="person_gender">
                    Gender*
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
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'gender'])
            </div>
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>
            </div>
            <div class="form-group">
                <div class="input-group date" id="dpp" name="dpp">
                    <input type="text" class="form-control"
                           data-date-format="YYYY-MM-DD">
                    <span class="input-group-addon datepickerbutton">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#dpp').datetimepicker();
                    });
                </script>
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'date_of_birth') }}}">
                <label class="control-label" for="person_date_of_birth">
                    Date of Birth*
                </label>

                <div class="input-group date" id="dp1">
                    <span class="input-group-addon datepickerbutton">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input required="true" type="text" class="form-control" name="person_date_of_birth"
                           id="person_date_of_birth" placeholder="Select your date of birth"
                           tabindex="4" value="{{{$person_date_of_birth}}}"
                           data-date-format="YYYY-MM-DD">
                    <script type="text/javascript">
                        $('#person_date_of_birth').datetimepicker();
                    </script>
                </div>
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
    </form>
    @include('helpers.discardChanges', ['activeTabName' => Constants\Settings\Tabs::PERSONAL , 'discardChangesUrl'
    =>
    'settings', 'discardChangesTabIndex' => '6'])
</div>