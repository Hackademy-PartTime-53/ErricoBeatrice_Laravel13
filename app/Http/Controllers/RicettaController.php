<?php
namespace App\Http\Controllers;
use App\Models\Ricetta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RicettaController extends Controller
{
    
    public function index()
    {
        $ricette = Ricetta::latest()->get();
        return view('ricette.index', compact('ricette'));
    }

    public function create()
    {
        return view('ricette.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titolo' => 'required|string|max:255',
            'contenuto' => 'required|string',
            'immagine' => 'nullable|image|max:2048',
        
        ]);

        if ($request->hasFile('immagine')) {
            $path = $request->file('immagine')->store('immagini', 'public');
            $validated['immagine'] = $path;
        }
        Ricetta::create($validated);        

        return redirect()->route('ricette.index')->with('success', 'Ricetta creata!');
    }

    public function show(Ricetta $ricetta)
    {
        return view('ricette.show', compact('ricetta'));
    }
    public function altro()
    {
        return view('admin.altro');  // La vista per il menù admin
    }
}
