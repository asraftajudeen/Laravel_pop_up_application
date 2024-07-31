@extends('layouts')

@section('content')
    <a href="#" id="modalshow" class="btn btn-primary">See The Records</a>

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
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#modalshow').click(function(e) {
            e.preventDefault(); // Prevent the default anchor tag behavior

            $.ajax({
                url: '{{ route('modal.show') }}',
                method: 'GET',
                success: function(response) {
                    console.log('Modal show response:', response); // Log the response
                    $('#modalContainer').html(response);
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
                    console.log('Form submission response:', response); // Log the response
                    alert(response.success);
                    $('#addDataForm')[0].reset(); // Clear the form
                    $('#modalshow').click(); // Refresh the table data
                },
                error: function(response) {
                    console.log('Form submission error:', response); // Log the error
                    alert('An error occurred while adding the data.');
                }
            });
        });
    });
</script>
@endsection
