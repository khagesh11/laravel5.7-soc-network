<div class="card mb-3">
    <div class="card-header find-friends-card-header">
        <h5 class="d-inline-block">
            <a href="{{ route('get.status', ['id' => Hashids::encode($friend->id), 'slug' => $friend->slug]) }}">
                {!! shortName($friend->name, 20) !!}
            </a>
        </h5>
        @include('layouts.friend-status', ['user' => $friend, 'delete' => $delete])
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3 col-sm-3 col-md-2">
                <div class="find-friends-items">
                    @include('layouts.profile-pic', ['user' => $friend])
                    <div class="mt-2"><strong class="card-text">{!! cityAndCountry($friend->profile->city, $friend->profile->country) !!}</strong></div>
                    <a 
                        href="{{ route('getWithSlug', ['id' => Hashids::encode($friend->id), 'slug' => $friend->slug]) }}"
                        class="to-profile"
                    >
                        View Profile
                    </a>
                </div>
            </div>
            <div class="col-9 col-sm-9 col-md-10 text-left pl-4">
                <h5>About</h5>
                @if($friend->profile->about)
                <div class="about-user">{!! nl2br($friend->profile->about) !!}</div>
                @endif
            </div>
        </div>
    </div>
</div>
