<x-guest-layout>

    <main>
        <img class="logo" src="{{ asset('img/Logo.png') }}" alt="Logo de notre site.">
        <h1>Inscription</h1>
        <form action="{{ route('register') }}" method="post">
            <x-jet-validation-errors/>
            @csrf
            <label>Nom
                <input type="text" id="name" name="name" :value="old('name')" required autofocus autocomplete="name">
            </label>
            <label>Email universitaire
                <input id="email" type="email" name="email" :value="old('email')" required>
            </label>
            <label>Mot de passe
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </label>
            <label>Confirmation du mot de passe
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </label>

            <button type="submit">S'inscrire</button>

            <p style="text-align: center; margin-top: 40px; color: #646464;">Déjà inscrit ? <a style="color: #646464;" href="{{ route('login') }}">Connectez-vous</a></p>
        </form>
    </main>
</x-guest-layout>
