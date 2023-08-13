<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
         <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
 

    @extends('layouts.admin')

@section('admin')

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <h1>Edit Product: {{ $editproduct->productName }}</h1>
    <form action="{{ route('product.update', $editproduct->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" value="{{ $editproduct->productName }}" required>
        </div>

        <div class="form-group">
            <label for="costPrice">Cost Price</label>
            <input type="number" class="form-control" id="costPrice" name="costPrice" value="{{ $editproduct->costPrice }}" required>
        </div>

        <div class="form-group">
            <label for="discount">Discount (%)</label>
            <input type="number" class="form-control" id="discount" name="discount" value="{{ $editproduct->discount }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $editproduct->description }}</textarea>
        </div>

      <div class="form-group">
    <label for="species">species</label>
    <select class="form-control" id="species" name="species" required>
        @foreach($species as $species)
            <!-- <option value="{{ $species->id }}" @if($species->id === $editproduct->species_id) selected @endif>{{ $species->name }}</option> -->
            <option value="{{ $species->id }}" {{ $species->id == $editproduct->species ? 'selected' : '' }}>{{ $species->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category" required>
        @foreach($categories as $category)
            <!-- <option value="{{ $category->id }}" @if($category->id == $editproduct->category) selected @endif>{{ $category->name }}</option> -->
            <option value="{{ $category->id }}" {{ $category->id == $editproduct->category ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
        </div>
   
    </div>
   
    
</div>


     <!-- Include Bootstrap JS and jQuery -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="/assets/demo/chart-area-demo.js"></script>
        <script src="/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="/js/datatables-simple-demo.js"></script>

@endsection