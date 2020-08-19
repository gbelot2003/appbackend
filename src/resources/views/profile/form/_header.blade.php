<div class="col-12 col-sm-auto mb-3">
    <div class="mx-auto" style="width: 140px;">
        <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
            <img class="img-profile rounded-circle" src="{{ Avatar::create(auth()->user()->email)->toBase64() }}">
        </div>
    </div>
</div>
<div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
    <div class="text-center text-sm-left mb-2 mb-sm-0">
        <div class="text-muted">
        </div><div class="mt-2">
            <button class="btn btn-primary" type="button">
                <i class="fa fa-fw fa-camera"></i>
                <span>{{ __('Change Photo') }}</span> </button>
        </div>
    </div>
</div>
