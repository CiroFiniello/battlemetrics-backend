<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rust Server Info</title>
</head>
<body>
    <h1>Rust Server Info</h1>
    <form id="server-form" method="POST" action="/api/search-server">
        @csrf
        <label for="query">Server ID or Name:</label>
        <input type="text" id="query" name="query" required>
        <button type="submit">Search Server Info</button>
    </form>
    <div id="server-info"></div>
    <div id="error-info" style="color: red;"></div>

    <script>
        document.getElementById('server-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const query = document.getElementById('query').value;
            const response = await fetch('/api/search-server', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ query: query })
            });
            if (!response.ok) {
                const errorText = await response.text();
                document.getElementById('error-info').innerText = `Error: ${errorText}`;
                return;
            }
            const data = await response.json();
            document.getElementById('server-info').innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
        });
    </script>
</body>
</html>
