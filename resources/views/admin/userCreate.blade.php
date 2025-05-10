@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea Nuovo Utente</h1>

        <form action="{{ route('utenti.nuovo') }}" method="POST">
            @csrf

            <div>
                <label for="name">Nome:</label><br>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="is_admin">Admin?</label>
                <input type="checkbox" name="is_admin" id="is_admin" value="1">
            </div>

            <button type="submit">Salva</button>
        </form>
        <div>
               <a href="{{ route('utenti.lista') }}" style="display:inline-block; margin-top:20px;">
            ⬅️ Torna alla lista utenti
        </a>
        </div>
    </div>
@endsection

