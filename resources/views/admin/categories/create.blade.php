@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Ajouter une catégorie</h1>

    <form action="#" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
