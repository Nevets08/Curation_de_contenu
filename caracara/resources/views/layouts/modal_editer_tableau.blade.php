<div class="edit-tableau modal">
    <div>
        <h2>Modifier le tableau</h2>

        <form action="{{ route('tableau.update', $tableau) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>
                Nom du tableau :
                <input type="text" placeholder="Nom du tableau" name="nom" required value="{{$tableau->nom}}">
            </label>

            <label>
                Description :
                <textarea name="description" cols="30" rows="2"
                          placeholder="Description du tableau...">{{$tableau->description}}</textarea>
            </label>

            <label>
                Nouvelle icône :
                <input type="file" name="icone" accept="image/png, image/jpeg">
            </label>

            <button type="submit">Modifier</button>
        </form>
    </div>
</div>
