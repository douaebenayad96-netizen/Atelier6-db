@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Catégories</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" class="text-center text-muted">Aucune catégorie trouvée</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
