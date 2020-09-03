<fieldset>
    <legend>{{ __('Profile Settings') }}</legend>
    <settings inline-template v-cloak :profile="{{ auth()->user()->profile }}">
        <div class="row text-left mb-3">

            <div class="col-md-4">
                <b-form-checkbox v-model="prof.share_profile" value="1" unchecked-value="0" name="check-button"
                                 @change="shareProperties" switch>
                    Share My Profile
                </b-form-checkbox>
            </div>


            <div class="col-md-4">
                <b-form-checkbox :disabled="!active" v-model="prof.share_name" value="1" unchecked-value="0" name="check-button"
                                 @change="UpdateProperty('share_name')" switch>
                    Share Name <br><small class="text-muted">(if not, alias will be display)</small>
                </b-form-checkbox>
            </div>

            <div class="col-md-4">
                <b-form-checkbox :disabled="!active" v-model="prof.share_email" value="1" unchecked-value="0" name="check-button" @change="UpdateProperty" switch>
                    Share e-mail
                </b-form-checkbox>
            </div>


            <div class="col-md-4">
                <b-form-checkbox :disabled="!active" v-model="prof.share_phone" value="1" unchecked-value="0" name="check-button" @change="UpdateProperty" switch>
                    Share Telephone
                </b-form-checkbox>
            </div>

            <div class="col-md-4">
                <b-form-checkbox :disabled="!active" v-model="prof.share_about" value="1" unchecked-value="0" name="check-button" @change="UpdateProperty" switch>
                    Share About Me
                </b-form-checkbox>
            </div>
        </div>

    </settings>

    <div class="dropdown-divider"></div>
</fieldset>
