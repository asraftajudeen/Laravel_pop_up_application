@extends('layouts')

@section('content')

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
<div class="main-body">
    <!-- Form to add data -->
    <form id="addDataForm">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-success">Add Data</button>
    </form>

    <!-- Include the modal -->
    <div id="modalContainer">
        <!-- Modal content will be loaded here -->
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.modalshow', function(e) {
            e.preventDefault(); // Prevent the default anchor tag behavior
            var id = $(this).data('id');

            $.ajax({
                url: '{{ route('element.modal.data') }}',
                method: 'GET',
                data: { 'id': id },
                success: function(data) {
                    $('#modalContainer').html(data);
                    $('#Modaltab').modal('show'); // Show the modal
                },
                error: function() {
                    alert('An error occurred while loading the partial view.');
                }
            });
        });

        $('#addDataForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: '{{ route('store.data') }}',
                method: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#addDataForm')[0].reset(); // Clear the form // Refresh the table data
                },
                error: function(response) {
                    console.log('Form submission error:', response); // Log the error
                    alert('An error occurred while adding the data.');
                }
            });
             // Fetch and update the records
             $.ajax({
                url: '{{ route('fetch.records') }}',
                method: 'GET',
                success: function(data) {
                    $('.records-part').html(data); // Update the records table
                },
                error: function() {
                    alert('An error occurred while fetching the records.');
                }
            });
        });
    });
</script>
@endsection
