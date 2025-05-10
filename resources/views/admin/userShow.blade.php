
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dettagli Utente</h1>

        <div>
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Admin:</strong> {{ $user->is_admin ? 'Sì' : 'No' }}</p>
            <p><strong>Creato il:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Aggiornato il:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
        </div>

        <a href="{{ route('utenti.lista') }}" style="display:inline-block; margin-top:20px;">
            ⬅️ Torna alla lista utenti
        </a>
    </div>
@endsection
