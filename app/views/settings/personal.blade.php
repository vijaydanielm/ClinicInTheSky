<div class="row">
    <form method="POST" action="{{{ URL::to('settings/doctor/person') }}}" accept-charset="UTF-8" role="form">
        <fieldset>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'first_name') }}}">
                <label class="control-label" for="first_name">
                    First Name
                </label>
                <input required="true" class="form-control" id="first_name"
                       placeholder="First name" type="text" name="first_name"
                       value="{{{ Input::old('first_name') }}}" autofocus="true" tabindex="1">
                            <span class="help-block">
                                First name should be between 2 and 128 characters long
                            </span>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'first_name'])
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'last_name') }}}">
                <label class="control-label" for="email">
                    Last name
                </label>
                <input required="true" class="form-control" id="last_name"
                       placeholder="Enter your last name" type="text" name="last_name"
                       value="{{{ Input::old('last_name') }}}" tabindex="2">
                            <span class="help-block">
                                Last name lol
                            </span>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'last_name'])
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'gender') }}}">
                <label class="control-label" for="gender">
                    Gender
                </label>
                <select required="required" class="form-control" id="gender" name="gender" tabindex="3">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <span class="help-block">
                    Your password should be between 6 and 64 characters long
                </span>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'gender'])
            </div>
            <div
                class="form-group {{{ ViewHelpers\ValidationError::feedback($validationErrors, 'date_of_birth') }}}">
                <label class="control-label" for="date_of_birth">
                    Date of Birth
                </label>
                <input required="true" class="form-control" id="date_of_birth"
                       placeholder="Select your date of birth" type="date" name="date_of_birth"
                       tabindex="4" value="{{{ Input::old('date_of_birth') }}}">
                <br>
                @include('helpers.fieldValidationErrorMessage', ['fieldName' => 'date_of_birth'])
            </div>

            @if($hasValidationErrors)
            <div class="alert alert-error alert-danger" role="alert">
                Please fix the above errors in order to continue creating your account.
            </div>
            @endif

            @include('helpers.displayNotice')

            <div class="form-group">
                <button tabindex="5" type="submit" class="btn btn-default btn-block btn-lg">
                    <span class="glyphicon glyphicon-cloud"></span>
                    Save
                </button>
            </div>
        </fieldset>
    </form>
</div>