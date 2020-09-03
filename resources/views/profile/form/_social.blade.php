<fieldset>
    <legend>Share Social Networks</legend>
    <social inline-template :links="{{ $user->profile }}" v-cloak>
        <b-form @submit="onSubmit">
            <div class="row">
                <div class="col-md-12">
                    <small class="text-muted">{{ __('Insert the link to your social networks pages') }}</small>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fab fa-facebook-f" aria-hidden="true"></i></div>
                        </div>
                        <input :disabled="!edit" type="text" name="facebook" class="form-control" v-model="profile.field_facebook" id="facebook" placeholder="Facebook">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fab fa-twitter"></span></div>
                        </div>
                        <input :disabled="!edit" type="text" name="twitter" class="form-control" id="twitter" v-model="profile.field_twitter" placeholder="Twitter">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fab fa-instagram"></span></div>
                        </div>
                        <input :disabled="!edit" type="text" name="instagram" class="form-control" id="instagram" v-model="profile.field_instagram" placeholder="Instagram">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><span class="fab fa-linkedin"></span></div>
                        </div>
                        <input :disabled="!edit" type="text" name="linkedin" class="form-control" id="linkedin" v-model="profile.field_linkedin">
                    </div>
                </div>
                <div class="col-md-12 text-left">
                    <button class="btn-info btn" v-if="!edit" @click="openEdit"><i class="fas fa-edit"></i> {{ __('Edit') }}</button>
                    <button type="submit" class="btn-primary btn" v-if="edit" @click="onSubmit"><i class="fas fa-paint-brush"></i> {{ __('Update') }}</button>
                    <button class="btn-danger btn" v-if="edit" @click="closeEdit"><i class="fas fa-arrow-left"></i> {{ __('Cancel') }}</button>
                </div>
            </div>
        </b-form>
    </social>
</fieldset>
<div class="dropdown-divider"></div>
