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
    <base href="/public">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style>
        .product-container{
            min-width: 50%;
            margin: 0 auto;
            margin-top: 5%;
            display: flex;
            gap: 2rem;
            justify-content: space-around;
        }
        .right{
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        .product-name{
            font-size: 36px;
            font-weight: 500;
            margin-left: 1rem;
        }
        .product-tooltip{
            margin-right: 5rem;
            color: gray;
        }
        .red-out{
            text-decoration: line-through;
            color: red;
        }
        .product-discount{
            font-size: 24px;
        }
        .product-quantity{
            margin-left: 1rem;
        }
        .product-category{
            margin-left: 1rem;
        }
        .product-description{
            margin-left: 1rem;
        }
        .prices-container{
            display: flex;
            gap: 1rem;
            background-color: ghostwhite;
            padding: 1rem;
        }
        .cart{
            margin: auto;
            width: 256px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        {{-- header section starts --}}
        @include('home.header')
        {{-- header section ends --}}

        {{-- product section starts --}}
        <div class="product-container">
            <div class="left">
                <div class="image-container">
                    <img src="/product/{{ $product->image }}" alt="" width="256px;">
                </div>
            </div>
            <div class="right">
                <div class="product-name">{{ $product->title }}</div>
                <div class="prices-container">
                    @if($product->discount_price != null)
                    <div class="product-price red-out">₱ {{ number_format($product->price) }}</div>
                    <div class="product-discount">₱ {{ number_format(intVal($product->discount_price)) }}</div>
                    @else
                    <div class="product-price" style="font-size: 24px;">₱ {{ number_format($product->price) }}</div>
                    @endif
                </div>
                <div class="product-quantity"><span class="product-tooltip">Quantity</span><span>{{ $product->quantity }}</span></div>
                <div class="product-category"><span class="product-tooltip">Product Category</span><span>{{ $product->category }}</span></div>
                <div class="product-description"><span class="product-tooltip">Product Description</span><span>{{ $product->description }}</span></div>
                <a href="{{ url('') }}" class="btn btn-primary cart">Add to cart</a>
            </div>
        </div>
    </div>
    {{-- product section ends --}}

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
