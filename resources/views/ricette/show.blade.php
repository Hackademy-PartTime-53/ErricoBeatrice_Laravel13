<x-mainlayout :title="$ricetta->titolo ?? 'Ricetta'">
    @if ($ricetta->immagine)
        <img src="{{ asset('storage/' . $ricetta->immagine) }}" alt="Foto della ricetta" class="img-fluid mb-3">
    @endif
    <p>{!! nl2br(e($ricetta->contenuto)) !!}</p>
    <a href="{{ route('ricette.index') }}" class="btn btn-secondary mt-3">← Torna alle ricette</a>
</x-mainlayout>
