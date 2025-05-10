@extends('layouts.app') {{-- O un layout admin se ne hai uno --}}

@section('content')
    <div class="mb-5">
     <form action="/admin/users/create" method="GET" style="display: inline;">
    <button type ="submit" style="background: none; border: 2px solid black p-2; color: #007bff; text-decoration: underline; cursor: pointer; padding: 0; font: inherit;">Crea nuovo utente</button>
    </form>  
    </div>


    
    <h1>Lista Utenti</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Sì' : 'No' }}</td>
                    <td>
                        <a href="{{ route('utenti.dettaglio', $user->id) }}">Visualizza</a> |
                        <a href="{{ route('utenti.modifica', $user->id) }}">Modifica</a> |
                        <form action="{{ route('utenti.elimina', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Sei sicuro?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
