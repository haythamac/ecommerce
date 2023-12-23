<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        {{-- header section starts --}}
        @include('home.header')
        {{-- header section ends --}}

        <?php $totalPrice = 0; ?>

        <div style="margin: auto; width: 80%;">
            <table class="table table-striped">
                <tr>
                    <th>Product title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th colspan="2">Action</th>
                </tr>
                @foreach ($cart as $item)
                <tr>
                    <td>{{ $item->product_title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>₱{{ $item->price }}</td>
                    <td><img style="width: 64px; height: 64px;" src="/product/{{$item->image}}" alt="{{ $item->product_title }} image"></td>
                    <td>Update</td>
                    <td><a onclick="return confirm('Remove item?')" href="{{ url('remove_cart', $item->id) }}" class="btn btn-danger">Remove</a></td>
                </tr>
                <?php $totalPrice += $item->price; ?>
                @endforeach
            </table>
        </div>
        <div class="center" style="width: 80%; margin: auto; font-size: 20px; color: red; font-weight: bold;">
            Total price: ₱<?php echo $totalPrice; ?>
        </div>
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>
