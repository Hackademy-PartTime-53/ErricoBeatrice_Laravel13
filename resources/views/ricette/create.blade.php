<x-mainlayout title="Aggiungi una Ricetta">
    <form action="{{ route('ricette.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo</label>
            <input type="text" name="titolo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contenuto" class="form-label">Contenuto</label>
            <textarea name="contenuto" rows="5" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
        <label for="immagine" class="form-label">Immagine della ricetta</label>
        <input type="file" class="form-control" name="immagine" id="immagine">
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</x-mainlayout>
