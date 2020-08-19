<div class="card">
    <img src="{{ Avatar::create(auth()->user()->email)->toBase64() }}" class="card-img-top" alt="img">
    <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <small>{{ __('About Me') }}</small>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <small>{{ __('About Me') }}</small>
            <p>{{ $user->email }}</p>
        </li>
        <li class="list-group-item">
            <small>{{ __('About Me') }}</small>
            <p>{{ $user->phonefield }}</p></li>
        <li class="list-group-item">
            <small>{{ __('About Me') }}</small>
            <p>{{ $user->roles[0]->name }}</p>
        </li>
    </ul>
</div>