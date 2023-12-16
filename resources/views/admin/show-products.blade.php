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
                @if(session()->has('alert'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('alert') }}
                    </div>
                @endif
                <h1 style="text-align: center; font-size: 36px; margin-bottom: 2rem;">Showing all products</h1>
                <table class="table bg-gray-300" style="color: black;">
                    <thead>
                        <tr>
                            <td>Image</td>
                            <td>Title</td>
                            <td>Category</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Discount price</td>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="/product/{{ $product->image }}" alt="{{ $product->title }} image">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount_price }}</td>
                            <td><a href="{{ url('update_product', $product->id)}}" class="btn btn-success">Update</a></td>
                            <td><a onclick="return confirm('Delete confirmation')" href="{{ url('delete_product', $product->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>