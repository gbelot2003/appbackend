@extends('layouts.auth')

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control form-control-user"
                                           id="name" placeholder="{{ __('Name') }}">
                                    @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror

                                </div>
                                <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control form-control-user"
                                           id="email" placeholder="Email Address">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group  row">
                                <div class="col-md-3">
                                    <select name="country_code" id="country_code" class="form-control">
                                        <option value="+504">+504</option>
                                        <option value="+501">+501</option>
                                        <option value="+502">+502</option>
                                        <option value="+503">+503</option>
                                        <option value="+505">+505</option>
                                        <option value="+506">+506</option>
                                        <option value="+507">+507</option>
                                        <option value="+52">+52</option>
                                        <option value="+1">+1</option>
                                    </select>
                                    <small id="country_label" class="text-muted">Honduras</small>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="phonefield" class="form-control form-control-user"
                                           id="phonefield" placeholder="{{ __('Phone Number') }}">
                                    @error('phonefield')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user"
                                           id="password" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation"
                                           class="form-control form-control-user" id="password_confirmation"
                                           placeholder="Repeat Password">
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Register Account') }}
                            </button>
                            <hr>
                            {{--<a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>--}}
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/password/reset">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="/login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop