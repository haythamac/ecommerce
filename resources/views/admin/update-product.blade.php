<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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

                  <form action="{{ url('/edit_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                      <label for="title">Product title</label>
                      <input type="text" name="title" placeholder="Name of product" value="{{ $product->title }}" style="color: black;">
                    </div>

                    <div>
                      <label for="description">Product Description</label>
                      <input type="text" name="description" placeholder="Write description" value="{{ $product->description }}" style="color: black;">
                    </div>

                    <div>
                      <label for="category">Category</label>
                      <select name="category" id="" style="color: black;">
                        <option value="{{ $product->category }}" selected>{{ $product->category }}</option>
                        @foreach($category as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div>
                      <label for="quantity">Quantity</label>
                      <input type="number" name="quantity" min="0" placeholder="How many" value="{{ $product->quantity }}" style="color: black;">
                    </div>

                    <div>
                      <label for="price">Price</label>
                      <input type="number" name="price" min="0" placeholder="Price the product" value="{{ $product->price }}" style="color: black;">
                    </div>

                    <div>
                      <label for="discount">Discounted price</label>
                      <input type="number" name="discount" min="0" placeholder="Discount to the price" value="{{ $product->discount_price }}" style="color: black;">
                    </div>

                    <div>
                      <label for="image">Current Image</label>
                      <img src="/product/{{ $product->image }}" alt="{{ $product->title }} image">
                    </div>

                    <div>
                      <label for="image">Change image</label>
                      <input type="file" name="image" value="{{ $product->image }}" placeholder="Product image">
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit" value="Update product">
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