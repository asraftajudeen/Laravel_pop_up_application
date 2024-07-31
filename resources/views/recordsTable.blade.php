<div class="records-part">
    <h3>The Records</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $item)
                <tr>
                    <td><a href="/{{$item->id}}" class="modalshow" data-id="{{ $item->id }}">{{ $item->id }}</a></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
