<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .active {
            background: gray;
        }

        table {
            overflow: hidden;
            text-align: center;
            margin-bottom: 25px;
        }

        table td {
            padding: 5px 10px;
        }

        table form {
            display: inline-block;
        }

        table form button {
            text-decoration: none;
            border: 1px solid black;
            border-radius: 5px;
            background-color: #dfd7fa;
            padding: 5px 15px;
            margin: 0 5px;
        }

        .alert-success {
            background-color: #adb3ed;
            padding: 20px;
            font-size: 20px;
            margin-top: 10px;
            width: 25%;
            border-radius: 5px;
        }
    </style>
</head>

<body>


    <section class="container">

        {{-- <h1>All Posts</h1> --}}
        <br> <br> <br>
        <table class="table table-bordered">
            <thead class="active">
                <th>Id</th>
                <th>Ttile</th>
                <th>Description</th>
                <th>Post creator</th>
                <th>created_at</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="@if ($loop->first)  @endif">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <form action="{{ route('post.show', $post->id) }}" method="get"><button>Show</button>
                            </form>
                            <form action="{{ route('post.update', $post->id) }}" method="get"> <button>Edit</button>
                            </form>
                            <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                @method('delete')
                                @csrf()
                                <button>Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
