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

<body>
    <h1>Insert New Review</h1>
    <form action="{{route('main.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="block">
            <label>Author</label>
            <select id="author">
                <option value="">Select Author</option>
                @foreach ($author as $a)
                    <option value="{{ $a->id}}">{{ $a->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="block">
            <label for="book_id">Book</label>
            <select name="book_id" id="title">
                <option value=""> Select Book</option>
            </select>
        </div>
        <div class="block">
            <label for="rating">Rating</label>
            <select name="rating" id="">
                @for ($i = 0; $i < 10; $i++)
                    <option value="{{$i + 1}}">{{ $i + 1}}</option>
                @endfor
            </select>
        </div>



        <button type="submit">Submit</button>
    </form>
</body>

<script>
    $(document).ready(function() {
        $('#title').attr('disabled', 'disabled');
        $('#author').on('change', function(e) {
            var authId = e.target.value;
            console.log(authId);
            $.ajax({
                url: "retrieve/" + authId,
                type: "GET",
                success: function(data) {
                    if (data.length === 0) {
                        $('#title').attr('disabled', 'disabled');
                    } else {
                        $('#title').removeAttr('disabled');
                        $('#title').empty();
                        $.each(data, function(index, book) {
                            $('#title').append('<option value="' + book.id +
                                '">' + book.name + '</option>');
                        })
                    }
                }
            })
        });
    });
</script>

</html>
