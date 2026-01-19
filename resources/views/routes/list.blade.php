@extends('luxe.layout')

@section('content')
<div class="container py-5">
    <h1>Liste des Routes</h1>
    
    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Méthode</th>
                    <th>Route</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($routes))
                    @foreach($routes as $route)
                        <tr>
                            <td>{{ implode('|', $route->methods) }}</td>
                            <td><code>{{ $route->uri }}</code></td>
                            <td>{{ $route->action['controller'] ?? $route->name }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center text-muted">Aucune route trouvée</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
