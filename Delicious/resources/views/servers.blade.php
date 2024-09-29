<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rust Servers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista dei server di Rust</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Giocatori</th>
                    <th>IP</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($servers))
                    @foreach ($servers as $server)
                        <tr>
                            <td>{{ $server['attributes']['name'] }}</td>
                            <td>{{ $server['attributes']['players'] }} / {{ $server['attributes']['maxPlayers'] }}</td>
                            <td>{{ $server['attributes']['ip'] }}:{{ $server['attributes']['port'] }}</td>
                            <td>{{ $server['attributes']['status'] }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nessun server trovato.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
