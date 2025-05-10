<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource. VEDO LA LISTA DI TUTTI GLI UTENTI 
     */
    public function index()
    {
         $users = User::all(); // Ottieni tutti gli utenti
        return view('admin.userIndex', compact('users'));
    }

    /**
     * Show the form for creating a new resource. CREAZIONE DI UN NUOVO UTENTE IN UNA NUOVA VISTA
     */
    public function create()
    {
        return view('admin.userCreate');
    }

    /**
     * Store a newly created resource in storage.VALIDAZIONE E SALVATAGGIO DEI DATI N ARRIVO
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:6',
        'is_admin' => 'boolean',
         ]);

        //  CREAZIONE UTENTE CON NUOVI DATI
         User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'is_admin' => $request->has('is_admin'), // checkbox => true/false
        ]);

        // REDIRECT ALLA LISTA UTENTI
         return redirect()->route('admin.userIndex')->with('success', 'Utente creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $user = User::findOrFail($id);
        return view('admin.userShow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.  MODIFICARE UN UTENTE ESISTENTE E COLLEGARLO ALLA VISTA
     */
    public function edit(string $id)
    {
         $user = User::findOrFail($id);   
         return view('admin.userEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.   SALVIAMO LA MODIFICA
     */
    public function update(Request $request, string $id)
    {
         $user = User::findOrFail($id);

    // Validazione
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6',
        'is_admin' => 'boolean',
    ]);

    // Aggiorna i campi base
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->is_admin = $request->has('is_admin');

    // Solo se una nuova password è fornita
    if (!empty($validated['password'])) {
        $user->password = Hash::make($validated['password']);
    }

    $user->save();

    return redirect()->route('admin.userIndex')->with('success', 'Utente aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.   ELIMINARE UN UTENTE
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
         $user->delete();

        return redirect()->route('admin.userIndex')->with('success', 'Utente eliminato con successo.');

    }
}
