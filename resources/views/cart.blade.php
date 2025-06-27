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
            <div class="col-9">
                <h1>Cart</h1>
            </div>
            <div class="col mt-2">
                <a href="/home"><button class="btn btn-primary">Home</button></a>
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
                <h3>Your Shopping Cart</h3>
                <br>

                <!-- Cart Item 1 -->
                @foreach($carts as $cart)
                <div class="cart-item d-flex justify-content-between">
                    <div class="d-flex">
                        <img src="{{$cart->picture}}" alt="Product" class="product-img me-3" />
                        <div>
                            <h5>{{$cart->name}}</h5>
                            <p class="text-muted">
                                {{$cart->discription}}
                            </p>
                            <div class="row">
                                <div class="col mt-2">
                                    <h6 class="foam-control" style="text-align: center">
                                        Quantity: {{$cart->quantity}}
                                    </h6>
                                </div>
                                <div class="col">
                                    <a href="/decrement/{{$cart->id}}">
                                        <button class="form-control w-50 btn btn-danger">
                                            -
                                        </button>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="/increment/{{$cart->id}}">
                                        <button class="form-control w-50 btn btn-primary">
                                            +
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between">
                        @php 
                            $item_total = $cart->price*$cart->quantity;
                            $total = $total+$item_total; 
                        @endphp

                        <span>${{$item_total}}</span>

                        <a href="/remove-cart/{{$cart->id}}">
                            <button class="btn btn-sm btn-danger">
                                Remove
                            </button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
           
            <!-- Cart Summary -->
            <div class="col-lg-4 mt-5">
                <div class="cart-summary">
                    <h4>Cart Summary</h4>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between">
                            <span>Subtotal:</span>
                            <span>${{ $total }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Shipping:</span>
                            <span>$10.00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="total-price">Total:</span>
                            <span class="total-price">${{ $total + 10 }}</span>
                        </li>
                    </ul>
                    <a href="/checkout">
                        <button class="btn btn-checkout w-100">
                            Proceed to Checkout
                        </button>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</body>

</html>