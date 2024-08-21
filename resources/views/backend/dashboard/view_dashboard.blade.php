<h1>Datmobs</h1>
<table>
    <thead>
        <tr>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datmobs as $datmobs)
            <tr>
                <td>{{ $datmobs->stok }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Dattrans</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Post ID</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dattrans as $dattrans)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->post_id }}</td>
                <td>{{ $comment->comment }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Datpens</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach($datpens as $datpens)
            <tr>
                <td>{{ $datpens->id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>