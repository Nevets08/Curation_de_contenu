<div class="members-management modal">
    <div>
        {{--        @if($user == $tableau->user)--}}
        @if($tableau->prive)
            <h2>Gérer les membres</h2>
            <h3>Liste des membres</h3>
            <table>
                @foreach ($tableau->users as $user)
                    <tr>
                        <td>{{ $user->name }}<br>Statut : @if ($user->pivot->contributeur) contributeur @else lecteur @endif</td>
                        <td class="change-statut-member">
                            @if ($user->pivot->contributeur)
                                <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="userToUpdate" value="{{$user->id}}">
                                    <input type="hidden" name="contributeur" value="0">

                                    <button type="submit">Nommer lecteur</button>
                                </form>
                            @else
                                <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="userToUpdate" value="{{$user->id}}">
                                    <input type="hidden" name="contributeur" value="1">

                                    <button type="submit">Nommer contributeur</button>
                                </form>
                            @endif
                        </td>
                        <td class="remove-member">
                            <form action="{{ route('tableau.update', $tableau) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="userToUpdate" value="{{$user->id}}">
                                <input type="hidden" name="quit" value="1">

                                <button type="submit"><i title="Supprimer ce membre du tableau" class="fas fa-times-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <h3>Ajouter des membres</h3>
            <form action="{{ route('tableau.update', $tableau) }}" method="post">
                @csrf
                @method('PUT')

                <label>
                    Qui voulez vous inviter ? (vous pouvez selectionner plusieurs personnes avec ctrl)
                    <select multiple name="user[]" required>
                        @foreach ($allUsers as $optionUser)
                            <option
                                value={{ $optionUser->id }}
                                @if (   $optionUser == $tableau->user //Le créateur du tableau
                                        || array_search($optionUser->toArray()['id'], array_column($tableau->users->toArray(), 'id')) !== false //Les gens déjà dans le tableau
                                    )
                                    disabled
                                style="display: none"
                                @endif
                            >
                                {{ $optionUser->name }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <button type="submit">Valider</button>
            </form>
        @endif
        {{--        @endif--}}

    </div>
</div>
