@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Éditoriaux</h1>

    <div class="table-responsive mt-4">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" class="text-center text-muted">Aucun éditorial trouvé</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
