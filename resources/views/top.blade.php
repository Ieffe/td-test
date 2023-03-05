<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    th, td, table{
        border: solid black;
        border-collapse: collapse
    }
</style>

<body>

    <h1>Top 10 Most Famous Author</h1>
    <a href="/">back</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Voters</th>
            </tr>
        </thead>

        @foreach ($best as $index => $b)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $b->author }}</td>
                <td>{{ $b->voters }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
