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
                @elseif(session()->has('alert'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('alert') }}
                    </div>
                @endif

                <div class="div-center">
                    <h2>Add Category</h2>
                    <form action="{{ url('/add_category') }}" method="POST">
                        @csrf
                        <input type="text" style="color: black;" name="category" placeholder="Category name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add category">
                    </form>

                    <table class="center table">
                        <tr>
                            <td>Category name</td>
                            <td>Action</td>
                        </tr>

                        @foreach($data as $data)
                        <tr>
                            <td>{{ $data->category_name }}</td>
                            <td><a onclick="return confirm('Delete confirmation')" href="{{ url('delete_category', $data->id) }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>