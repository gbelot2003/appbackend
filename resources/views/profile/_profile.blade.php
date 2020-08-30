<div class="card">
    <div class="image p-1" style="width:50%;">
        <img src="{{ Avatar::create(auth()->user()->email)->toBase64() }}" class="card-img-top" alt="img">
    </div>

    <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="text-muted">{{ $user->roles[0]->name }}</p>
        <small>{{ __('About Me') }}</small>
        <p class="card-text">{{ $user->profile->about }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <small>{{ __('E-mail') }}</small>
            <p>{{ $user->email }}</p>
        </li>
        <li class="list-group-item">
            <small>{{ __('Telephone') }}</small>
            <p>{{ $user->phonefield }}</p></li>
        <li class="list-group-item">
            <small>{{ __('Alias') }}</small>
            <p>{{ $user->profile->alias }}</p>
        </li>
    </ul>
</div>