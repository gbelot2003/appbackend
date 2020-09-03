<div class="card">
    <div class="image p-1" style="width:50%;">
        @if(!isset($user->profile->avatar))
            <img src="{{ Avatar::create(auth()->user()->email)->toBase64() }}" class="card-img-top" alt="img">
        @else
            <img src="{{ $user->profile->avatarPath() }}" class="card-img-top rounded" alt="img">
        @endif
    </div>

    <div class="card-body">
        @if(auth()->user()->profile->share_name)
            <h5 id="profile_name" class="card-title text-danger">{{ $user->name }} </h5>
        @else
            <h5 id="profile_name" class="card-title">{{ $user->profile->alias }}</h5>
        @endif

        <p class="text-muted">{{ $user->roles[0]->name }}</p>
        <small>{{ __('About Me') }}</small>
            @if(auth()->user()->profile->share_about)
                <p class="card-text text-danger">{{ $user->profile->about }}</p>
            @else
                <p class="card-text">{{ $user->profile->about }}</p>
            @endif
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <small>{{ __('E-mail') }}</small>
            @if(auth()->user()->profile->share_email)
                <p class="text-danger">{{ $user->email }}</p>
            @else
                <p>{{ $user->email }}</p>
            @endif

        </li>
        <li class="list-group-item">
            <small>{{ __('Telephone') }}</small>
            @if(auth()->user()->profile->share_phone)
                <p class="text-danger">{{ $user->phonefield }}</p></li>
            @else
                <p>{{ $user->phonefield }}</p></li>
            @endif
        <li class="list-group-item">
            <small>{{ __('Alias') }}</small>
            <p>{{ $user->profile->alias }}</p>
        </li>
    </ul>
</div>