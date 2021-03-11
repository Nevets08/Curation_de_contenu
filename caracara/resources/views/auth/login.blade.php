<x-guest-layout>
    <main>
        <img class="logo" src="{{ asset('img/Logo.png') }}" alt="Logo de notre site.">
        <h1>Connexion</h1>
        <form action="{{ route('login') }}" method="post">
            <x-jet-validation-errors/>
            @csrf
            <label>Email
                <input type="email" id="email" name="email" :value="old('email')" required autofocus>
            </label>
            <label>Mot de passe
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </label>
            <label>
                <input style="width: auto" id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span>Se souvenir de moi</span>
            </label>

            <button type="submit">Se connecter</button>

            @if (Route::has('password.request'))
                <a style="text-align: center; margin-top: 40px; color: #646464;" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            @endif

            <p style="text-align: center; margin-top: 0; color: #646464;">Pas encore inscrit ? <a style="color: #646464; text-decoration: underline" href="{{ route('register') }}">Inscrivez-vous</a></p>
        </form>
    </main>
</x-guest-layout>
