<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Bon dia tingueu</h1>
    @if ($data->isNotEmpty())
        <ul>
            @foreach ($data as $item)
                <li>User: {{ $item->nom }}, Product: {{ $item->producte }}</li>
            @endforeach
        </ul>
    @else
        <p>No data available.</p>
    @endif
</body>
</html>
