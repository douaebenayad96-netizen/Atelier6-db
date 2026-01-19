@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Commandes</h1>

    <div class="table-responsive mt-4">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Numéro</th>
                    <th>Client</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6" class="text-center text-muted">Aucune commande trouvée</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
