@extends('layouts.admin')

@section('admin')



<div class="container-fluid px-4">
                        <h1 class="mt-4">Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
                               + Add Category
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
                    <th>NAME</th>
                    <th>ACTION</th>
                    
                
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    
                    <td>{{$category->name}}</td>
                    
                    <td>
                    <button class="btn btn-danger delete-button" data-category-id="{{ $category->id }}"><i class="fas fa-trash"></i></button>
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
                const categoryId = this.getAttribute('data-category-id');

                // Show a simple JavaScript alert for confirmation
                if (confirm('Are you sure you want to delete this category?')) {
                    // If user confirms, submit the form with the DELETE request
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/addcategory/${categoryId}`;
                    form.innerHTML = `@csrf @method('DELETE')`;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
</script>



<!-- Category Modal -->
<div class="modal" id="categoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                     <!-- Display Success Message -->
                    
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <form id="categoryForm" method="post" action="{{ url('category') }}">
                    @csrf
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-12">
                           

                            <!-- Category Name -->
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" spellcheck="true" id="name" name="name" placeholder="Enter category name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
         <div class="modal-footer">
                        <!-- Submit Button -->
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
        $("#categoryModal").modal("show");
    });
</script>


<script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

@endsection