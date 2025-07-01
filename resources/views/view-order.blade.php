<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .cart-item {
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .cart-summary {
            border: 1px solid #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-summary .total-price {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-checkout {
            background-color: #28a745;
            color: white;
        }

        .btn-checkout:hover {
            background-color: #218838;
        }

        .product-img {
            max-width: 100px;
            object-fit: cover;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-3">
        <div class="row rows-cols-3">
            <div class="col-6">
                <h1>Cart</h1>
            </div>
            <div class="col mt-2">
                <a href="/orders"><button class="btn btn-primary">Back</button></a>
            </div>
            <div class="col mt-2">
                <a href="/sign-out"><button class="btn btn-danger">Sign Out</button></a>
            </div>
        </div>
    </div>

    <hr />
    @php $total = 0; @endphp

    <div class="container mt-5">
        <div class="row">
            <!-- Shopping Cart Items -->
            <div class="col-lg-8">
                <h3>Order Items</h3>
                <br>

                <!-- Cart Item 1 -->
                @foreach($orders as $order)
                <div class="cart-item d-flex justify-content-between">
                    <div class="d-flex">
                        <img src="{{$order->book->picture}}" alt="Product" class="product-img me-3" />
                        <div>
                            <h5>{{$order->book->name}}</h5>
                            <p class="text-muted">
                                Author: {{$order->book->author}}
                                <br>
                                Publisher: {{$order->book->publisher}}
                            </p>
                            <div class="row">
                                <div class="col mt-2">
                                    <h6 class="foam-control" style="text-align: center">
                                        Quantity: {{$order->quantity}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between">
                        @php 
                            $item_total = $order->book->price*$order->quantity;
                            $total = $total+$item_total; 
                        @endphp

                        <span>${{$item_total}}</span>
                    </div>
                </div>
                @endforeach
            </div>
           
        </div>
    </div>
</body>

</html>