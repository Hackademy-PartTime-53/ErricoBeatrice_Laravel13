@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Utente</h1>

        <form action="{{ route('utenti.lista', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Nome:</label><br>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div>
                <label for="password">Nuova Password (opzionale):</label><br>
                <input type="password" name="password" id="password">
            </div>

            <div>
                <label for="is_admin">Admin?</label>
                <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
            </div>

            <button type="submit">Aggiorna</button><br>
            <div><a href="{{ route('utenti.lista') }}" style="display:inline-block; margin-top:20px;">
            ⬅️ Torna alla lista utenti
            </div>
            
            </a>
        </form>
    </div>
@endsection
