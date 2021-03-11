<div class="article-repost modal">
    <div>
        {{-- Reposts --}}
        <form action="{{ route('post.update', $post) }}" method="post">
            @csrf
            @method('PUT')

            <label>
                A quel(s) tableau(x) souhaitez-vous l'ajouter ? <br>
                (Astuce : vous pouvez selectionner plusieurs tableaux avec ctrl.)
                <select multiple required name="tableau[]">
                    @foreach ($tableaux as $tab)
                        @can('addPost', $tab)
                            <option
                                value={{ $tab->id }}
                                @foreach ($post->tableaux as $postTab)
                                @if ($tab->id === $postTab->id)
                                    hidden disabled
                                @endif
                                @endforeach
                            >
                                {{ $tab->nom }}
                            </option>
                        @endcan
                    @endforeach
                </select>
            </label>

            <button type="submit">Reposter</button>
        </form>
    </div>
</div>
