<fieldset>
    <legend>{{ __('Change your password') }}</legend>
    <password inline-template v-cloak>
        <b-form @submit="onSubmit">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group text-left">
                        <label for="new_password">New Password</label>
                        <input type="password" name="password" id="new_password" class="form-control" v-model="datos.password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-left">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" v-model="datos.password_confirmation">
                    </div>
                </div>
                <div class="col-md-12 text-left">
                    <button type="submit" class="btn-primary btn">{{ __('Change Password') }}</button>
                </div>
            </div>
        </b-form>
    </password>
</fieldset>

<div class="dropdown-divider"></div>
