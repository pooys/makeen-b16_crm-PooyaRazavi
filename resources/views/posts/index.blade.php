<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products List</title>
</head>

<body>
    <h1>Products List</h1>
    <table border="1" style="width:700px">
        <tr>
            <th>ID</th>
            <th>اسم</th>
            <th>مقاله</th>
            <th>دسته بندی</th>

        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->brand }}</td>
                <td>{{ $post->cat }}</td>
                <td>
                    <a href="/posts/edit/{{ $post->id }}">Edit</a> /
                    <form action="/posts/delete/{{ $post->id }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
