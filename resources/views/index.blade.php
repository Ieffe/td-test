<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


</head>

<style>
    th,
    td,
    table {
        border: solid black;
        border-collapse: collapse
    }

    .pagination {
        list-style-type: none;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .pagination>li {
        float: left;
        margin: 10px;
    }
</style>

<body>
    <h1>Review Books</h1>
    <div>
        <a href="{{ route('best') }}" style="margin-right: 20px">See top 10</a>
        <a href="/main/create">Add New Review</a>
    </div>

    <div style="margin-top: 20px">
        <label for="item">Show Pages</label>
        <select name="" id="entry">
            <option value="10" @if ($items == 10) selected @endif>10</option>
            <option value="25" @if ($items == 25) selected @endif>25</option>
            <option value="50" @if ($items == 50) selected @endif>50</option>
            <option value="100" @if ($items == 100) selected @endif>100</option>
        </select>
    </div>
    @if ($message = Session::get('success'))
        <div style="margin-top:20px">
            <strong>{{ $message }}</strong>
        </div>

    @endif
    <div style="margin-top: 20px">
        <form action="{{ route('search') }}" method="get">
            <label for="search">Search Pages</label>
            <input type="text" name="search" id="search">
        </form>

    </div>
    <div>
        <table style="margin-top: 20px">
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category</th>
                <th>Author Name</th>
                <th>Avg. Rating</th>
                <th>Voter</th>
            </tr>
            @foreach ($bookList as $index => $b)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <th>{{ $b->title }}</th>
                    <th>{{ $b->category }}</th>
                    <th>{{ $b->author }}</th>
                    <th>{{ $b->rating }}</th>
                    <th>{{ $b->voters }}</th>
                </tr>
            @endforeach
        </table>

        {!! $bookList->appends(compact('items', 'search'))->links('vendor.pagination.default') !!}
    </div>


</body>
<script>
    $(document).ready(function($) {
        $("#entry").change(function() {
            window.document.location = window.location = "{!! $bookList->url(1) !!}&items=" + $(this)
                .val();
        });
    });
</script>

</html>
