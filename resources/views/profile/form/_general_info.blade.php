<general inline-template :user="{{ $user }}" :countries="{{ $countries }}" :cities="{{ $cities }}" v-cloak>
    <fieldset>
        <legend>{{ __('General Information') }}</legend>
        <div class="row">
            <images image="{{ auth()->user()->profile->avatarPath() }}"></images>
        </div>
        <div class="dropdown-divider"></div>
        <b-form @submit="onSubmit">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group text-left">
                        <label for="name">{{ __('Name') }}</label>
                        <input required type="text" name="name" class="form-control" id="name" v-model="person.name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-left">
                        <label for="name">{{ __('E-Mail') }}</label>
                        <input required type="email" name="email" class="form-control" id="name" v-model="person.email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group text-left">
                        <label for="name">{{ __('Alias') }}</label>
                        <input type="text" name="alias" class="form-control" id="alias" placeholder="{{__('An alias you prefer')}}" v-model="person.alias">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group text-left">
                        <label for="name">{{ __('Telephone') }}</label>
                        <input required type="text" name="phonefield" class="form-control" id="phonefield" v-model="person.phonefield">
                    </div>
                </div>
            </div>

            <div class=" row">
                <div class="col-md-6">
                    <div class="form-group text-left">
                        <label for="country">{{ __('Country') }}</label>
                        <b-form-select v-model="person.country" :options="dcountries" @change="seachCities"></b-form-select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-left">
                        <label for="city">{{ __('City') }}</label>
                        <b-form-select v-model="person.city" :options="dcities"></b-form-select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-left">
                        <label for="name">{{ __('About Me') }}</label>
                        <textarea class="form-control" id="about" name="about" placeholder="Tell us Something about you" v-model="person.about">
                    </textarea>
                    </div>
                </div>

                <div class="col-md-12 text-left">
                    <button type="submit" class="btn-primary btn">{{ __('Update') }}</button>
                </div>
            </div>
        </b-form>
    </fieldset>
</general>
