@extends('layouts.admin')

@section('admin')


<div class="container-fluid px-4">
                        <h1 class="mt-4">species</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#speciesModal">
                                + Add species
                            </button>
                            </li>
                        </ol>
                        @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

</div>
  <!-- Display error message if it exists -->
  @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

<br>
<div class="container-fluid">
     <div class="table-responsive">
        <table id="example" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>SPECIES NAME</th>
                    <th>CATEGORY NAME</th>
                    <th>ACTION</th>
                    
                
                </tr>
            </thead>
            <tbody>
                @foreach($species as $specie)
                <tr>
                    
                    <td>{{$specie->name}}</td>
                    
                    <td>{{ $specie->category_name }}</td>
                    <td>
                    <button class="btn btn-danger delete-button" data-species-id="{{ $specie->id }}"><i class="fas fa-trash"></i></button>
                    </td>
                 
                </tr>
               @endforeach
                <!-- Add more rows with data here -->
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript for Delete Confirmation -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the delete buttons by their class name
        const deleteButtons = document.getElementsByClassName('delete-button');

        // Add event listener to each delete button
        Array.from(deleteButtons).forEach(button => {
            button.addEventListener('click', function () {
                const speciesId = this.getAttribute('data-species-id');

                // Show a simple JavaScript alert for confirmation
                if (confirm('Are you sure you want to delete this species?')) {
                    // If user confirms, submit the form with the DELETE request
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/species/${speciesId}`;
                    form.innerHTML = `@csrf @method('DELETE')`;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
</script>

<!-- species Modal -->
<div class="modal" id="speciesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                     <!-- Display Success Message -->
                    
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
        <!-- Inside the modal-body -->
<form id="speciesForm" method="post" action="{{ url('species') }}">
    @csrf
    <div class="form-group">
        <label for="category">Select Category</label>
        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            
        </select>
        @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
    </div>
    <div class="form-group">
        <label for="speciesName">Species Name</label>
        <input type="text" class="form-control @error('speciesName') is-invalid @enderror" id="speciesName" name="speciesName" placeholder="Enter species name" value="{{ old('speciesName') }}">
        @error('speciesName')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>
<!-- end modal -->


<script>
    $(document).ready(function() {
        // Open the modal on page load
        $("#speciesModal").modal("show");
    });
</script>
<script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@endsection