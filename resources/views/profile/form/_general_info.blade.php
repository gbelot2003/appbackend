<fieldset>
    <legend>{{ __('General Information') }}</legend>

    <div class="row">
        @include('profile.form._header')

    </div>
    <div class="dropdown-divider"></div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="name">{{ __('E-Mail') }}</label>
                <input type="email" name="email" class="form-control" id="name" value="{{ $user->email }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="name">{{ __('Alias') }}</label>
                <input type="text" name="alias" class="form-control" id="alias" placeholder="{{__('An alias you prefer')}}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="name">{{ __('Telephone') }}</label>
                <input type="text" name="phonefield" class="form-control" id="phonefield" value="{{ $user->phonefield }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="country">{{ __('Country') }}</label>
                <input type="country" name="country" class="form-control" id="country" placeholder="Country" value="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group text-left">
                <label for="city">{{ __('City') }}</label>
                <input type="city" name="country" class="form-control" id="city" placeholder="City" value="">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-left">
                <label for="name">{{ __('About Me') }}</label>
                <textarea class="form-control" id="about" name="about" placeholder="Tell us Something about you"></textarea>
            </div>
        </div>

        <div class="col-md-12 text-left">
            <button type="submit" class="btn-primary btn">{{ __('Update') }}</button>
        </div>
    </div>
</fieldset>