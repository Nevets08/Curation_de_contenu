<div class="members-line">
    <img src="{{$tableau->user->profile_photo_url}}" alt="{{$tableau->user->name}}">
    @foreach ($tableau->users as $user)
        <img src="{{$user->profile_photo_url}}" alt="{{$user->name}}">
    @endforeach
    {{-- <div class="more-members">
        <span>+7</span>
    </div> --}}
</div>

<button><i class="fas fa-users"></i>Liste des membres</button>

@include('components/modals/modal_members_list')
