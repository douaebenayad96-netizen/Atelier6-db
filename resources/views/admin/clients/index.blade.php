@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Clients</h1>

    <div class="table-responsive mt-4">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date d'inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" class="text-center text-muted">Aucun client trouvé</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
