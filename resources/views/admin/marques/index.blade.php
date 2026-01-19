@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Marques</h1>

    <div class="table-responsive mt-4">
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
                    <td colspan="3" class="text-center text-muted">Aucune marque trouvée</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
