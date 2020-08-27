<fieldset>
    <legend>{{ __('Change your password') }}</legend>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-left">
                <label for="current_password">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="Confirm_password">Confirm Password</label>
                <input type="password" name="Confirm_password" id="Confirm_password" class="form-control">
            </div>
        </div>
        <div class="col-md-12 text-left">
            <button type="submit" class="btn-primary btn">{{ __('Change Password') }}</button>
        </div>
    </div>
</fieldset>

<div class="dropdown-divider"></div>