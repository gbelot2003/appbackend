<fieldset>
    <legend>Share Social Networks</legend>
    <div class="row">
        <div class="col-md-12">
            <small  class="text-muted">{{ __('Insert the link to your social networks pages') }}</small>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fab fa-facebook-f" aria-hidden="true"></i></div>
                </div>
                <input type="text" name="facebook" class="form-control"
                       value="{{ $user->profile->field_facebook }}" id="facebook" placeholder="Facebook">
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span class="fab fa-twitter"></span></div>
                </div>
                <input type="text" name="twitter" class="form-control" id="twitter"
                       value="{{ $user->profile->field_twitter }}" placeholder="Twitter">
            </div>
        </div>

        <div class="col-md-12">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span class="fab fa-instagram"></span></div>
                </div>
                <input type="text" name="instagram" class="form-control" id="instagram"
                       value="{{ $user->profile->field_instagram }}" placeholder="Instagram">
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span class="fab fa-linkedin"></span></div>
                </div>
                <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="LinkedIn"
                       value="{{ $user->profile->field_linkedin }}" >
            </div>
        </div>
        <div class="col-md-12 text-left">
            <button type="submit" class="btn-primary btn">{{ __('Update Social Networls') }}</button>
        </div>
    </div>
</fieldset>
<div class="dropdown-divider"></div>