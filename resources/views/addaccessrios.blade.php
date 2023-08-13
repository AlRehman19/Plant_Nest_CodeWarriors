@extends('layouts.admin')

@section('admin')

<style>
    /* Add active class to change the button color */
    .btn.active {
        background-color: #80bdff !important;
        color: #fff !important;
        padding: 8px 25px; /* Add padding to the active button */
    }

    /* Add CSS class for Wellcome button active state */
    .btn.wellcome-btn.active {
        background-color: #80bdff!important;
        color: #fff !important;
        padding: 8px 25px; /* Add padding to the active button */
    }
</style>




<div class="container-fluid px-4">
                        <h1 class="mt-4">Accessrios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                + Add accessrios
                            </button>
                            </li>
                        </ol>
                        @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
</div>

                        <br>

                        <div class="container-fluid">
    <div class="table-responsive">
        <table id="example" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td><img width="50" height="50" src="{{ asset('images/'.$product->image) }}" alt="{{$product->productName}}"></td>
                    <td>{{$product->productName}}</td>
                    <td>{{$product->discountPrice}}</td>
                   
                    <td>
                    <button title="Delete" class="btn btn-danger delete-button" data-product-id="{{ $product->id }}"><i class="fas fa-trash"></i></button>
                     <a href="{{ route('accessrios.edit', $product->id) }}"><button title="Edit" class="btn btn-success"><i class="fas fa-edit"></i></button>
                       </a>
                      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                     <!-- Display Success Message -->
                    
                </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="productForm" action="{{ url('/accessrios') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- First Column -->
                        <div class="col-md-7">


                            <!-- Product Name -->
                            <div class="form-group">
                                <label for="productName">Accessory Name</label>
                                <input type="text" class="form-control @error('productName') is-invalid @enderror" id="productName" name="productName" placeholder="Enter accessrory name" value="{{ old('productName') }}">
                                @error('productName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Cost Price -->
                            <div class="form-group">
                                <label for="costPrice">Cost Price</label>
                                <input type="number" class="form-control @error('costPrice') is-invalid @enderror" id="costPrice" name="costPrice" placeholder="Enter cost price" value="{{ old('costPrice') }}">
                                @error('costPrice')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- Discount Price
                                <div class="form-group">
                                    <label for="discountPrice">Discount Price</label>
                                    <input type="number" class="form-control @error('discountPrice') is-invalid @enderror" id="discountPrice" name="discountPrice" placeholder="Enter discount price" value="{{ old('discountPrice') }}">
                                    @error('discountPrice')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> -->
                           <!-- Discount -->
                                <div class="form-group">
                                    <label for="discount">Discount (%)</label>
                                    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" placeholder="Enter discount percentage" value="{{ old('discount', 0) }}">
                                    @error('discount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                            <!-- Description -->
                            <div class="form-group">
                                        <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Enter accessory description">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                           

                            </div>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-5">

                            <!-- quantity -->
                            <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Enter quantity" value="{{ old('quantity') }}">
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>

                          
                               

                                

                            <!-- Image -->
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" required class="form-control" id="image" name="image">
                                @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                            </div>
                         </div>
                    </div>
                    <div class="row">
    <div class="col-md-4"> 
        <div class="form-group">
            <label for="feature">Featured Product</label> 
            <br>
            <div class="btn-group" role="group" aria-label="Feature">
                <button type="button" class="btn btn-secondary feature-btn @if(old('feature', 0) == 0) active @endif" data-value="0">No</button>
                <button type="button" class="btn btn-secondary feature-btn @if(old('feature') == 1) active @endif" data-value="1">Yes</button>
                <input type="hidden" id="feature" name="feature" value="{{ old('feature', 0) }}">
            </div>
        </div>
    </div>
</div>

                    <div class="modal-footer">
                    
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Add accessory</button>
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
        $("#myModal").modal("show");
    });
</script>

<script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
<!-- Place this script at the end of the HTML file, right before the closing </body> tag -->
<script>
    $(document).ready(function() {
        // Get the buttons and hidden inputs
        const featureButtons = document.querySelectorAll('.feature-btn');
        const featureInput = document.getElementById('feature');

        // Function to set the value and active class for feature buttons
        function setFeatureValue(value) {
            featureInput.value = value;
            featureButtons.forEach(button => button.classList.remove('active'));
            const activeButton = document.querySelector(`.feature-btn[data-value="${value}"]`);
            if (activeButton) {
                activeButton.classList.add('active');
            }
        }

        // Function to set the value and active class for wellcome buttons
        function setWellcomeValue(value) {
            wellcomeInput.value = value;
            wellcomeButtons.forEach(button => button.classList.remove('active'));
            const activeButton = document.querySelector(`.wellcome-btn[data-value="${value}"]`);
            if (activeButton) {
                activeButton.classList.add('active');
            }
        }

        // Add event listeners to the buttons
        featureButtons.forEach(button => {
            button.addEventListener('click', () => {
                const value = button.getAttribute('data-value');
                setFeatureValue(value);
            });
        });

        wellcomeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const value = button.getAttribute('data-value');
                setWellcomeValue(value);
            });
        });

        // Set initial values on page load
        setFeatureValue({{ old('feature', 0) }});
    });
</script>



<!-- JavaScript for Delete Confirmation -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the delete buttons by their class name
        const deleteButtons = document.getElementsByClassName('delete-button');

        // Add event listener to each delete button
        Array.from(deleteButtons).forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');

                // Show a simple JavaScript alert for confirmation
                if (confirm('Are you sure you want to delete this product?')) {
                    // If user confirms, submit the form with the DELETE request
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/accessrios/${productId}`;

                    form.innerHTML = `@csrf @method('DELETE')`;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
</script>


@endsection