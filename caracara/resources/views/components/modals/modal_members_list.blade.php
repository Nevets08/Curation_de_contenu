<div class="members-list modal">
    <div>
        <h2>Liste des membres</h2>

            @if($tableau->prive)
                <ul>
                    <li>
                        <img src="{{$tableau->user->profile_photo_url}}" alt="{{ $tableau->user->name }}">
                        {{ $tableau->user->name }}
                    </li>
                    @foreach ($tableau->users as $user)
                        <li>
                            <img src="{{$user->profile_photo_url}}" alt="{{ $user->name }}">
                            {{ $user->name }}
                        </li>
                    @endforeach
                </ul>
            @endif

    </div>
</div>
