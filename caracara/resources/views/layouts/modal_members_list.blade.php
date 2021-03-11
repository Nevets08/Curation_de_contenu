<div class="members-list modal">
    <div>
        <h2>Liste des membres</h2>

            @if($tableau->prive)
                <ul>
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
