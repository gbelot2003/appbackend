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

<style>
    [v-cloak]>* {
        display: none;
    }

    [v-cloak]::before {
        position: relative;
        top: 10%;
        left: 35%;
        content: "";
        display: block;
        width: 150px;
        height: 150px;
        border: 16px solid #f3f3f3;
        /* Light grey */
        border-top: 16px solid #3498db;
        /* Blue */
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    .cloak-fade:not([v-cloak]) {
        opacity: 0;
        -webkit-animation-name: cloak-fade-in;
        animation-name: cloak-fade-in;
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }

</style>
