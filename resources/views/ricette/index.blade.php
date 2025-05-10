<x-mainlayout title="Tutte le Ricette">
    <a href="{{ route('ricette.create') }}" class="btn btn-success mb-3">Aggiungi Ricetta</a>

    @foreach ($ricette as $ricetta)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $ricetta->titolo }}</h5>

            @if ($ricetta->immagine)
                <img src="{{ asset('storage/' . $ricetta->immagine) }}" alt="Foto" class="img-fluid mb-2" style="max-width: 300px;">
            @endif

            <p class="card-text">{{ Str::limit($ricetta->contenuto, 100) }}</p>
            <a href="{{ route('ricette.show', $ricetta) }}" class="btn btn-primary">Vedi Ricetta</a>
             </div>
        </div>
    @endforeach
</x-mainlayout>
