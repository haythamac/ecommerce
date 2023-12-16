<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="div-center">
                  <h2>Update product</h2>

                  <form action="{{ url('/edit_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                      <label for="title">Product title</label>
                      <input type="text" name="title" placeholder="Name of product" style="color: black;">
                    </div>

                    <div>
                      <label for="description">Product Description</label>
                      <input type="text" name="description" placeholder="Write description" style="color: black;">
                    </div>

                    <div>
                      <label for="category">Category</label>
                      <select name="category" id="" style="color: black;">
                        @foreach($category as $category)
                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div>
                      <label for="quantity">Quantity</label>
                      <input type="number" name="quantity" min="0" placeholder="How many" style="color: black;">
                    </div>

                    <div>
                      <label for="price">Price</label>
                      <input type="number" name="price" min="0" placeholder="Price the product" style="color: black;">
                    </div>

                    <div>
                      <label for="discount">Discounted price</label>
                      <input type="number" name="discount" min="0" placeholder="Discount to the price" style="color: black;">
                    </div>

                    <div>
                      <label for="image">Image</label>
                      <input type="file" name="image" placeholder="Product image">
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" value="Add product">
                  </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>