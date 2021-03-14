<x-guest-layout>
    <main>
        <img class="logo" src="{{ asset('img/Logo.png') }}" alt="Logo de notre site.">
        <h1>Reinitialiser le mot de passe</h1>
        <form action="{{ route('password.email') }}" method="post">
            <x-jet-validation-errors/>
            @csrf
            <label>Email universitaire
                <input id="email" type="email" name="email" :value="old('email')" required>
            </label>

            <button type="submit">Reinitialiser le mot de passe</button>
        </form>
    </main>
</x-guest-layout>
